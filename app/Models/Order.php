<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Products;
use App\Models\Coupons;

class Order extends Model
{

    protected $table = 'orders';
    protected $fillable = [
        'user_id', 'product_id', 'name', 'price',
        'amount', 'order_date', 'total_amount', 'username', 'address', 'phone', 'payment', 'image', 'image_user','coupon_id', 'coupon', 'PurchasePrice'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function product()
    {
        return $this->belongsTo(Products::class, 'product_id');
    }

    public function coupon()
    {
        return $this->belongsTo(Coupons::class, 'coupon_id');
    }
    public static function validate(array $data)
    {
        // Get the product corresponding to the ID to get the quantity of that product in stock.
        $product = Products::find($data["product_id"]);

        $errors = [];

        if (empty($data["address"])) {
            $errors["address"] = "Địa chỉ không hợp lệ!";
        }

        // Regex to check phone number 
        $pattern = "/^(\d{3}-){2}\d{4}$/";
        if (!$data["phone"]) {
            $errors["phone"] = "Số điện thoại đang rỗng!";
        } else if (!preg_match($pattern, $data["phone"])) {
            $errors["phone"] = "Số điện thoại không hợp lệ!";
        }

        if(($product->quantity) <= 0) {
            $errors["total_amount"] = "Hiện tại sản phẩm đã hết hàng, vui lòng chọn sản phẩm khác.";
        }

        //If the number of products the customer chooses is greater than the number of products in stock, the user is asked to re-select the appropriate quantity.
        if (!isset($data["amount"]) || $data["amount"] > $product->quantity) {
            $errors["amount"] = "Hiện tại chỉ còn lại " . $product->quantity . " vui lòng chọn số lượng phù hợp.";
        }
        return $errors;
    }
}
