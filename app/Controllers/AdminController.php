<?php

namespace App\Controllers;

use App\Models\Order;
use App\SessionGuard as Guard;
use App\Models\Products;
use App\Models\User;
use App\Models\Feedback;
use App\Models\Coupons;

// use Illuminate\Support\Facades\Process;
// use League\Plates\Template\Func;
// use App\Models\Contact;

class AdminController extends Controller
{
    public function __construct()
    {
        if (!Guard::isAdminLoggedIn()) {
            redirect('admin/login');
        }

        parent::__construct();
    }

    public function index()
    {
        $this->sendPage('admin/adminDashboard', [
            'productinfo' => Products::all(),
        ]);
    }

    public function create()
    {
        $this->sendPage('admin/createproduct', [
            'errors' => session_get_once('errors'),
            'success' => session_get_once('success'),
            'old' => $this->getSavedFormValues(),
            "test" => "Create product page is opened..."
        ]);
    }
    public function store()
    {
        $data = $this->filterProductData($_POST);
        $data['images'] = [];
        $files = $_FILES['images'];

        for ($i = 0; $i < count($files['name']); $i++) {
            if ($files['error'][$i] === 0 && getimagesize($files['tmp_name'][$i])) {
                $imageName = $files['name'][$i];
                move_uploaded_file($files['tmp_name'][$i], 'assets/' . $imageName);
                $data['images'][] = $imageName;
            }
        }

        //$data = $this->filterProductData($_POST);
        $model_errors = Products::validate($data);
        $data['created_at'] = date('Y-m-d H:i:s');
        $data["type"] = $_POST["type"];
        $data["screen"] = $_POST["screen"];
        $data["resolution"] = $_POST["type-resolution"];
        $data["memory"] = $_POST["type-memory"];
        if (empty($model_errors)) {
            $product = new Products();
            $product->fill($data);
            $product->belongsTo(Order::class);
            $product->save();
            $success = "Thêm sản phẩm thành công.";
            redirect('/admin/addproduct', ["success" => $success]);
        }
        // Lưu các giá trị của form vào $_SESSION['form']
        $this->saveFormValues($_POST);
        // Lưu các thông báo lỗi vào $_SESSION['errors']
        redirect('/admin/addproduct', ['errors' => $model_errors]);
    }
    protected function filterProductData(array $data)
    {
        return [
            'name' => $data['name'] ?? '',
            'price' => $data['price'] ?? '',
            'PurchasePrice' => $data['PurchasePrice'] ?? '',
            'image' => $data["images"] ?? '',
            'quantity' => $data["quantity"] ?? '',
            'description' => $data["description"] ?? ''
        ];
    }

    public function edit($productId)
    {
        $product = Products::find($productId);
        if (!$product) {
            $this->sendNotFound();
        }
        $form_values = $this->getSavedFormValues();
        $data = [
            'errors' => session_get_once('errors'),
            'product' => (!empty($form_values)) ?
                array_merge($form_values, ['id' => $product->id]) :
                $product->toArray()
        ];
        $this->sendPage('/admin/editproduct', $data);
    }
    public function update($productId)
    {
        $product = Products::find($productId);
        if (!$product) {
            $this->sendNotFound();
        }

        $data = $this->filterProductData($_POST);
        $data['images'] = [];
        $files = $_FILES['images'];

        for ($i = 0; $i < count($files['name']); $i++) {
            if ($files['error'][$i] === 0 && getimagesize($files['tmp_name'][$i])) {
                $imageName = $files['name'][$i];
                move_uploaded_file($files['tmp_name'][$i], 'assets/' . $imageName);
                $data['images'][] = $imageName;
            }
        }
        $model_errors = Products::validate($data);
        $data["type"] = $_POST["type"];
        $data["screen"] = $_POST["screen"];
        $data["resolution"] = $_POST["type-resolution"];
        $data["memory"] = $_POST["type-memory"];
        if (empty($model_errors)) {
            $product->fill($data);
            $product->save();
            redirect('/admin');
        }
        $this->saveFormValues($_POST);
        redirect('/admin/editproduct/' . $productId, [
            'errors' => $model_errors,
        ]);
    }

    public function destroy($productId)
    {
        $product = Products::find($productId);

        if ($product->orders->isNotEmpty()) {
            $product->orders()->delete();
        }
        if (!$product) {
            $this->sendNotFound();
        }
        $product->delete();
        redirect('/admin');
    }

    public function show()
    {
        $customers = User::all();
        $this->sendPage('/admin/customers', ['customers' => $customers]);
    }

    public function deleteuser($userId)
    {
        $user = User::find($userId);
        $orders = $user->orders;

        echo var_dump(count($orders));
        if (!$user && !$orders) {
            $this->sendNotFound();
        }

        for ($i = 0; $i < count($orders); $i++) {
            $orders[$i]->delete();
        }
        $user->delete();
        redirect("/admin/customers");
    }

    public function showorders()
    {
        $orders = Order::orderBy('created_at', 'desc')->get();
        $this->sendPage("/admin/orders", ["orders" => $orders]);
    }

    // Delete order
    public function deleteorder($orderId)
    {
        $order = Order::find($orderId);
        $productId = $order->product_id;
        $product = Products::find($productId);
        if (!$order) {
            $this->sendNotFound();
        }

        if ($order->state >= 1) {
            redirect("/admin/orders", ['errors' => 'Đơn hàng đã được chuyển đi không thể hủy.']);
        }
        $order->delete();
        $product->test--;
        $product->save();
        redirect("/admin/orders");
    }

    // Update order state
    public function updateorder($orderId)
    {
        $order = Order::find($orderId);
        if (!$order) {
            $this->sendNotFound();
        }
        if ($order->state >= 1) {
            $order->state = 2;
            $order->save();
            redirect("/admin/orders", ['success' => 'Đơn hàng đã được giao thành công.']);
        } else {
            $order->state = 1;
            $order->save();
            redirect("/admin/orders", ['success' => 'Đơn hàng đã được chuyển đi.']);
        }
    }

    public function showfeedback()
    {
        $feedbacks = Feedback::orderBy('created_at', 'desc')->get();
        $this->sendPage("/admin/feedback", ["feedbacks" => $feedbacks]);
    }

    public function createcoupon()
    {
        $this->sendPage('admin/createcoupon', [
            'errors' => session_get_once('errors'),
            'success' => session_get_once('success'),
            'old' => $this->getSavedFormValues(),
            "test" => "Create product page is opened..."
        ]);
    }

    public function addcoupon()
    {
        $data["coupon_code"] = $_POST["coupon_code"];
        $data["num_uses"] = $_POST["num_uses"];
        $data["name_coupon"] = $_POST["name_coupon"];
        $data["expiration_date"] = $_POST["expiration_date"];
        $data["price_coupon"] = $_POST["price_coupon"];
        $data['created_at'] = date('Y-m-d H:i:s');
        $model_errors = Coupons::validate($data);
        if (empty($model_errors)) {
            $coupon = new Coupons();
            $coupon->fill($data);
            $coupon->save();
            $success = "Tạo mã giảm giá thành công.";
            redirect('/admin/addcoupon', ["success" => $success]);
        }
        $this->saveFormValues($_POST);
        redirect('/admin/addcoupon', ['errors' => $model_errors]);
    }

    public function showcoupon()
    {
        $coupons = Coupons::orderBy('created_at', 'desc')->get();
        $this->sendPage("/admin/coupon", ["coupons" => $coupons]);
    }

    public function destroyCoupon($couponId)
    {
        $coupon = Coupons::find($couponId);
        if (!$coupon) {
            $this->sendNotFound();
        } else {
            $coupon->delete();
            redirect('/admin/coupon', ['success' => "Xóa mã giảm giá thành công."]);
        }
    }

    public function editCoupon($couponId)
    {
        $coupon = Coupons::find($couponId);
        if (!$coupon) {
            $this->sendNotFound();
        }
        $form_values = $this->getSavedFormValues();
        $data = [
            'errors' => session_get_once('errors'),
            'coupon' => (!empty($form_values)) ?
                array_merge($form_values, ['id' => $coupon->id]) :
                $coupon->toArray()
        ];
        $this->sendPage('/admin/editcoupon', $data);
    }

    public function updateCoupon($couponId)
    {
        $coupon = Coupons::find($couponId);
        $data["coupon_code"] = $_POST["coupon_code"];
        $data["num_uses"] = $_POST["num_uses"];
        $data["name_coupon"] = $_POST["name_coupon"];
        $data["expiration_date"] = $_POST["expiration_date"];
        $data["price_coupon"] = $_POST["price_coupon"];
        $data['updated_at'] = date('Y-m-d H:i:s');
        $model_errors = Coupons::validate($data);
        if (empty($model_errors)) {
            $coupon->fill($data);
            $coupon->save();
            $success = "Chỉnh sửa mã giảm giá thành công.";
            redirect('/admin/coupon', ["success" => $success]);
        }
        $this->saveFormValues($_POST);
        redirect('/admin/coupon', ['errors' => $model_errors]);
    }

    public function statistics($date = null, $interval = 'daily')
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' || isset($_POST['interval'])) {
            $interval = $_POST['interval'];
        }

        switch ($interval) {
            case 'weekly':
                $startDate = date('Y-m-d', strtotime('monday this week'));
                $endDate = date('Y-m-d', strtotime('sunday this week'));
                break;
            case 'monthly':
                $startDate = date('Y-m-d', strtotime('first day of this month'));
                $endDate = date('Y-m-d', strtotime('last day of this month'));
                break;
            case 'last_week':
                $startDate = date('Y-m-d', strtotime('monday last week'));
                $endDate = date('Y-m-d', strtotime('sunday last week'));
                break;
            case 'last_month':
                $startDate = date('Y-m-d', strtotime('first day of last month'));
                $endDate = date('Y-m-d', strtotime('last day of last month'));
                break;
            default:
                $startDate = $endDate = date('Y-m-d');
        }

        $currentDate = date('Y-m-d');

        $totalRevenue = Order::whereDate('created_at', '>=', $startDate)
            ->whereDate('created_at', '<=', $endDate)
            ->sum('total_amount');

        $totalProductsSold = Order::whereDate('created_at', '>=', $startDate)
            ->whereDate('created_at', '<=', $endDate)
            ->sum('amount');

        $totalOrders = Order::whereDate('created_at', '>=', $startDate)
            ->whereDate('created_at', '<=', $endDate)
            ->count();

        $totalFeedbacks = Feedback::whereDate('created_at', '>=', $startDate)
            ->whereDate('created_at', '<=', $endDate)
            ->count();

        $totalPriceOrder = Order::whereDate('created_at', '>=', $startDate)
            ->whereDate('created_at', '<=', $endDate)
            ->sum('price');

        $totalPurchasePriceOrder = Order::whereDate('created_at', '>=', $startDate)
            ->whereDate('created_at', '<=', $endDate)
            ->sum('PurchasePrice');

        $totalProfit =  $totalRevenue - ($totalPriceOrder - $totalPurchasePriceOrder);

        $warehouses = Products::all();

        $TotalSellingPrice = Order::whereDate('created_at', '>=', $startDate)
            ->whereDate('created_at', '<=', $endDate)
            ->sum('price');

        $TotalPurchasePrice = Order::whereDate('created_at', '>=', $startDate)
            ->whereDate('created_at', '<=', $endDate)
            ->sum('PurchasePrice');

        $this->sendPage(
            'admin/warehouse',
            [
                'date' => $date,
                'interval' => $interval,
                'startDate' => $startDate,
                'endDate' => $endDate,
                'totalRevenue' => $totalRevenue,
                'totalProductsSold' => $totalProductsSold,
                'totalOrders' => $totalOrders,
                'totalFeedbacks' => $totalFeedbacks,
                'TotalSellingPrice' => $TotalSellingPrice,
                'TotalPurchasePrice' => $TotalPurchasePrice,
                'totalProfit' => $totalProfit,
                'warehouses' => $warehouses
            ]
        );
    }

    public function showChatBox()
    {
        $customersChat = User::all();
        $this->sendPage("/admin/chatbox", ["customersChat" => $customersChat]);
    }

    public function searchUser()
    {
        if (empty($_POST["find_Name"])) {
            $errorMessage = "Vui lòng nhập nội dung tìm kiếm!";
            redirect("admin/chatbox", ["errors" => $errorMessage, "customersChat" => User::all()]);
        }

        $users = User::where('name', 'LIKE', '%' . $_POST["find_Name"] . '%')->get();

        if ($users->isEmpty()) {
            $errorMessage = "Không tìm thấy người dùng '" . $_POST["find_Name"] . "' vui lòng nhập lại!";
            $this->sendPage("admin/chatbox", [
                "customersChat" => User::all(),
                "errors" => $errorMessage
            ]);
        } else {
            $this->sendPage("admin/chatbox", [
                "customersChat" => $users
            ]);
        }
    }
}
