<?php

namespace App\Controllers;

use App\Models\Order;
use App\Models\Products;
use App\Models\User;
use App\Models\Feedback;
use App\Models\Chat;
use App\Models\Messages;
use Illuminate\Http\Request;
use App\Models\Coupons;
use App\SessionGuard as Guard;
use Illuminate\Support\Facades\Process;

class HomeController extends Controller
{
    public function __construct()
    {
        // if (!Guard::isUserLoggedIn()) {
        //     redirect('/login');
        // }

        parent::__construct();

        if (Guard::isUserLoggedIn()) {
            $this->updateOnlineUser(Guard::user()->id, 1);
        }
    }

    public function updateOnlineUser($userId, $status)
    {
        $user = User::find($userId);
        if ($user) {
            $user->is_online = $status;
            $user->save();
        }
    }

    public function index()
    {
        $products = Products::all();
        $productinfo = $products->isEmpty() ? [] : $products;

        $this->sendPage('home/index', [
            'userinfo' => Guard::user(),
            'productinfo' => $productinfo,
        ]);
    }

    public function create()
    {
        $this->sendPage('home/orderInformation', [
            'errors' => session_get_once('errors'),
            'success' => session_get_once('success'),
            'old' => $this->getSavedFormValues(),
            "test" => "Create product page is opened..."
        ]);
    }

    public function order($productId)
    {
        $product = Products::find($productId);

        if (!Guard::isUserLoggedIn()) {
            redirect('/login');
        }
        if (!$product) {
            $this->sendNotFound();
        }

        $this->sendPage("home/order", ["product" => $product]);
    }

    public function ordered($productId)
    {
        $product = Products::find($productId);
        $user = Guard::user();
        $data["product_id"] = $productId;
        $data["user_id"] = $user->id;
        $data["username"] = $user->name;
        $data["image_user"] = $user->image;
        $data["product_id"] = $product->id;
        $data["name"] = $product->name;
        $data["price"] = $product->price;
        $data["PurchasePrice"] = $product->PurchasePrice;
        $data["amount"] = $_POST["total_amount"];
        $data["payment"] = $_POST["payment"];
        $data["address"] = $_POST["address"];
        $data["phone"] = $_POST["phone"];
        $data["coupon"] = $_POST['coupon'];
        $data["image"] = $product->images;
        $data["order_date"] = date('Y-m-d H:i:s');

        if (!empty($data["coupon"])) {
            $couponCode = $data["coupon"];
            $coupon = Coupons::where('coupon_code', $couponCode)->first();
            if ($coupon) {
                if ($coupon->num_uses <= 0 || $coupon->expiration_date < date('Y-m-d H:i:s')) {
                    redirect($product->id, ['errors' => "Mã giảm giá không khả dụng hoặc đã hết hạn."]);
                } else {
                    $data["coupon_id"] = $coupon->id;
                    $data["total_amount"] = (float)$product->price * $data["amount"];
                    $data["total_amount"] -= $coupon->price_coupon;
                    $data["total_amount"] = $data["total_amount"];
                    if ($coupon->num_uses <= 0) {
                        $coupon->num_uses = 0;
                        $coupon->save();
                    } else {
                        $coupon->num_uses--;
                        $coupon->save();
                    }
                }
            } else {
                redirect($product->id, ['errors' => "Mã giảm giá không hợp lệ."]);
            }
        } else {
            $data["coupon_id"] = null;
            $data["total_amount"] = (float)$product->price * $data["amount"];
            $data["total_amount"] = $data["total_amount"];
        }

        $model_errors = Order::validate($data);

        if (empty($model_errors)) {
            $order = new Order();
            $product->test +=  $_POST["total_amount"];
            $order->fill($data);
            $product->quantity -= $order->amount;
            $product->save();
            $order->user()->associate(Guard::user());
            $order->save();
            $this->sendPage('home/order', ["success" => "Shop sẽ cố gắng liên hệ với bạn để xác nhận đơn hàng sớm nhất.", "product" => $product]);
        }

        if (!empty($model_errors)) {
            // Hiển thị thông báo lỗi chi tiết
            $this->sendPage('home/order', ['errors' => $model_errors, "product" => $product]);
            return;
        }
        $this->saveFormValues($_POST);
        $this->sendPage('home/order', ['errors' => "Có lỗi xảy ra, vui lòng kiểm tra lại!!", "product" => $product]);
    }

    public function getRelatedProducts($product)
    {
        return Products::where('type', $product->type)
            ->where('id', '!=', $product->id)
            ->get();
    }

    public function detail($productId)
    {
        $product = Products::find($productId);
        if (!$product) {
            $this->sendNotFound();
        }

        $product->view_count++;
        $product->save();

        $relatedProducts = $this->getRelatedProducts($product);

        $this->sendPage("home/detail", [
            "product" => $product,
            "relatedProducts" => $relatedProducts
        ]);
    }

    public function orderhistory()
    {
        if (!Guard::isUserLoggedIn()) {
            redirect('/login');
        }
        $customer = User::find(Guard::user()->id);
        $orders = $customer->orders;
        $this->sendPage("home/orderhistory", ["orders" => $orders]);
    }

    public function search()
    {
        if (empty($_POST["search"])) {
            $errorMessage = "Vui lòng nhập nội dung tìm kiếm!";
            redirect("home", ["errors" => $errorMessage]);
        }
        $products = Products::all();

        $resultArray = [];
        foreach ($products as $product) {
            if (stripos($product->name, $_POST["search"]) !== false) {
                $resultArray[$product->id] = $product;
                continue;
            }
        }
        if (empty($resultArray)) {
            $errorMessage = "Không tìm thấy sản phẩm '" . $_POST["search"] . "' vui lòng nhập lại!";
            redirect("home", ["errors" => $errorMessage]);
        } else {
            $this->sendPage("home/searchresult", ["resultArray" => $resultArray]);
        }
    }

    public function showprofile()
    {
        if (!Guard::isUserLoggedIn()) {
            redirect('/login');
        }
        $user = Guard::user();
        $customer = User::find(Guard::user()->id);
        $orders = $customer->orders;

        $countOrders = count($orders);
        $this->sendPage("home/profile", ["user_data" => $user, "amountoforder" => $countOrders]);
    }

    public function editprofile()
    {
        $user = Guard::user();
        $this->sendPage("home/editprofile", ["user_data" => $user]);
    }

    public function saveprofile()
    {

        $data = $_POST;
        $image = $_FILES['image']['name'];
        $tmp_image = $_FILES['image']['tmp_name'];
        $target_dir = "assets/";
        $target_file = $target_dir . basename($image);
        if (!file_exists($target_file)) {
            move_uploaded_file($tmp_image, $target_file);
        }
        $data["image"] = $target_file;
        $user = User::find(Guard::user()->id);
        $user->name = $data["name"];
        $user->email = $data["email"];
        $user->phone = $data["phone"];
        $user->address = $data["address"];
        $user->image = $target_file;
        $user->save();

        $user_data = Guard::user();
        redirect("/profile", ["success" => "Thông tin của bạn đã được cập nhật", "user_data" => $user_data]);
    }

    public function addtocart($productId)
    {
        if (Guard::isUserLoggedIn()) {
            $product = Products::find($productId);

            $userId = Guard::user()->id;

            $cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
            $productFound = false;
            foreach ($cart as $item) {
                if ($item['product_id'] === $productId) {
                    $productFound = true;
                    break;
                }
            }

            if ($productFound) {
                redirect("/cart", ["errors" => 'Sản phẩm này đã có trong giỏ hàng của bạn.']);
            } else {
                $cartItem = [
                    'user_id' => $userId,
                    'product_id' => $productId,
                    'product_name' => $product->name,
                    'product_image' => $product->images,
                    'product_quantity' => $product->quantity,
                    'product_price' => $product->price
                ];
                $cart[] = $cartItem;
                $_SESSION['cart'] = $cart;
                redirect("/cart", ["success" => "Sản phẩm đã được thêm vào giỏ hàng.", "cartItem" => $cartItem]);
            }
        } else {
            redirect('/login');
        }
    }

    public function cart()
    {
        if (!Guard::isUserLoggedIn()) {
            redirect('/login');
        }

        $cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
        $this->sendPage("home/cart", ["cart" => $cart]);
    }

    public function removeProductCart($productId)
    {
        if (Guard::isUserLoggedIn()) {
            $cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
            $productIndex = -1;
            foreach ($cart as $key => $item) {
                if ($item['product_id'] == $productId) {
                    $productIndex = $key;
                    break;
                }
            }

            if ($productIndex !== -1) {
                unset($cart[$productIndex]);
                $_SESSION['cart'] = $cart;

                $successMessage = "Sản phẩm đã được xóa khỏi giỏ hàng.";
                redirect("/cart", ["success" => $successMessage]);
            } else {
                $errorsMessage = "Sản phẩm không tồn tại trong giỏ hàng.";
                redirect("/cart", ["errors" => $errorsMessage]);
            }
        } else {
            redirect('/login');
        }
    }

    public function feedbackAction($productId)
    {
        if (!Guard::isUserLoggedIn()) {
            redirect('/login');
        }
        $product = Products::find($productId);
        $user = Guard::user();
        $data["product_id"] = $productId;
        $data["user_id"] = $user->id;
        $data["image_user"] = $user->image;
        $data["address_user"] = $user->address;
        $data["username"] = $user->name;
        $data["product_id"] = $product->id;
        $data["name"] = $product->name;
        $data["image"] = $product->images;
        $data["description"] = $_POST['description'];
        $data["quality"] = $_POST['quality'];
        $data["up_date"] = date('Y-m-d H:i:s');
        $model_errors = Feedback::validate($data);
        if (empty($model_errors)) {
            $feedback = new Feedback();
            $feedback->fill($data);
            $feedback->user()->associate(Guard::user());
            $feedback->save();
            $this->sendPage('home/detail', ["success" => "Cám ơn bạn đã quan tâm đến sản phẩm!", "product" => $product]);
        } else {
            $this->sendPage('home/detail', ['errors' => $model_errors, "product" => $product]);
            return;
        }
        $this->saveFormValues($_POST);

        $this->sendPage('home/detail', ['errors' => "Có lỗi xảy ra, vui lòng kiểm tra lại!", "product" => $product]);
    }

    public function feedback($productId)
    {
        $product = Products::find($productId);

        if (!Guard::isUserLoggedIn()) {
            redirect('/login');
        }
        if (!$product) {
            $this->sendNotFound();
        }

        $this->sendPage("home/detail", ["product" => $product]);
    }

    public function showOrder()
    {
        if (!Guard::isUserLoggedIn()) {
            redirect('/login');
        }
        $customer = User::find(Guard::user()->id);
        $viewOrders = $customer->orders()->orderBy('created_at', 'desc')->get();
        $this->sendPage("home/orderInformation", ["viewOrders" => $viewOrders]);
    }

    public function cancelOrder($orderId)
    {
        $order = Order::find($orderId);
        $productId = $order->product_id;
        $product = Products::find($productId);
        if (!$order) {
            $this->sendNotFound();
        }
        if ($order->state < 1) {
            $order->delete();
            $product->test -= $order->amount;
            $product->save();
            $success = "Đã hủy đơn hàng thành công.";
            redirect("/view_order", ["success" => $success]);
        } else {
            $errors = "Đơn hàng đã được xử lý, không thể hủy.";
            redirect("/view_order", ["errors" => $errors]);
        }
    }

    public function showChatBox()
    {
        if (!Guard::isUserLoggedIn()) {
            redirect('/login');
        }
        $customer = User::find(Guard::user()->id);
        $viewOrders = $customer->orders()->orderBy('created_at', 'desc')->get();
        $this->sendPage("home/chatbox", ["viewOrders" => $viewOrders]);
    }
}
