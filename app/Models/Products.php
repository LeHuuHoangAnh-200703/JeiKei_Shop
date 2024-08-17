<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Order;

class Products extends Model
{
    protected $table = 'products';
    protected $fillable = ['name', 'description', 'price', 'images', 'type', 'quantity', 'created_at', 'updated_at', 'view_count', 'sold_count', 'screen', 'resolution', 'memory', 'test', 'PurchasePrice'];
    public function orders()
    {
        return $this->hasMany(Order::class, 'product_id');
    }

    public function getSoldCountAttribute()
    {
        // Tính số lượng đơn hàng liên quan đến sản phẩm
        $ordersCount = $this->orders()->count();

        return $ordersCount;
    }
    public static function validate(array $data)
    {
        $errors = [];
        if (!is_array($data)) {
            $errors['data'] = 'Định dạng dữ liệu không hợp lệ.';
            return $errors;
        }

        if (!$data['name']) {
            $errors['name'] = 'Tên là bắt buộc.';
        }

        if (!$data['price']) {
            $errors['price'] = 'Giá là bắt buộc.';
        }

        if (!$data['PurchasePrice']) {
            $errors['PurchasePrice'] = 'Giá là bắt buộc.';
        }

        if (!$data['quantity']) {
            $errors['quantity'] = 'Số lượng là bắt buộc.';
        }

        if (strlen($data['description']) > 2000) {
            $errors['description'] = 'Mô tả phải dài tối đa 2000 ký tự.';
        }

        if (empty($data['images']) || count($data['images']) === 0) {
            $errors['images'] = 'Vui lòng chọn ít nhất một hình ảnh để tải lên.';
        }
        return $errors;
    }
}
