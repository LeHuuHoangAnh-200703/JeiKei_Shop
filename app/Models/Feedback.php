<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Products;

class Order extends Model
{

    protected $table = 'feedbacks';
    protected $fillable = [
        'user_id', 'product_id', 'name', 'username', 'image', 'description', 'up_date'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function product()
    {
        return $this->belongsTo(Products::class, 'product_id');
    }
    public static function validate(array $data)
    {
        // Get the product corresponding to the ID to get the quantity of that product in stock.
        $product = Products::find($data["product_id"]);

        $errors = [];

        if (!$data["name"]) {
            $errors['name'] = 'Tên không hợp lệ.';
        }

        if (!$data['evaluate']) {
            $errors['evaluate'] = 'Đánh giá không hợp lệ.';
        }

        return $errors;
    }
}
