<?php

namespace App\Models;
use App\Models\Order;
use Illuminate\Database\Eloquent\Model;

class Coupons extends Model
{
    protected $table = 'coupons';
    protected $fillable = ['coupon_code', 'num_uses', 'expiration_date', 'created_at', 'updated_at', 'name_coupon', 'price_coupon'];

    public function orders()
    {
        return $this->hasMany(Order::class, 'coupon_id');
    }

    public static function validate(array $data)
    {
        $errors = [];
        if (!$data['name_coupon']) {
            $errors['name_coupon'] = 'Tên mã giảm giá là bắt buộc.';
        }

        if (!$data['coupon_code']) {
            $errors['coupon_code'] = 'Mã giảm là bắt buộc.';
        }

        if (!$data['price_coupon']) {
            $errors['price_coupon'] = 'Giá trị mã giảm giá là bắt buộc.';
        }

        if (!$data['num_uses']) {
            $errors['num_uses'] = 'Số lần sử dụng là bắt buộc.';
        }
        if (!$data['expiration_date']) {
            $errors['expiration_date'] = 'Ngày sử dụng là bắt buộc.';
        }

        return $errors;
    }
}
