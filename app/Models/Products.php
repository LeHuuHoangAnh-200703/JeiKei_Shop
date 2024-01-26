<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Order;

class Products extends Model
{
    protected $table = 'products';
    protected $fillable = ['name', 'description', 'price', 'image', 'type', 'quantity', 'created_at', 'updated_at', 'view_count', 'sold_count', 'image_1', 'image_2', 'image_3', 'image_4'];
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
            $errors['data'] = 'Invalid data format.';
            return $errors;
        }

        if (!$data['name']) {
            $errors['name'] = 'Name is required.';
        }

        if (!$data['price']) {
            $errors['price'] = 'Price is required.';
        }
        if (!$data['quantity']) {
            $errors['quantity'] = 'Quantity is required.';
        }

        if (strlen($data['description']) > 2000) {
            $errors['description'] = 'Notes must be at most 2000 characters.';
        }

        $imageFields = ['image', 'image_1', 'image_2', 'image_3', 'image_4'];
        foreach ($imageFields as $imageField) {
            if (($data[$imageField]) === "") {
                $errors[$imageField] = "Please select an image file to upload.";
            }
        }
        return $errors;
    }
}
