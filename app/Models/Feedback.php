<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Products;

class Feedback extends Model
{

    protected $table = 'feedbacks';
    protected $fillable = [
        'user_id', 'product_id', 'name', 'username', 'image', 'description', 'up_date', 'address_user', 'image_user', 'quality'
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

        if (!$data['description']) {
            $errors['description'] = 'Trường đánh giá đang trống.';
        }

        return $errors;
    }
}
