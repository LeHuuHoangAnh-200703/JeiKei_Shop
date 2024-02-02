<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Products;

class Carts extends Model
{
    protected $table = 'carts';
    protected $fillable = ['productID', 'image', 'product_Name', 'price'];
    public static function validate(array $data)
    {
        $errors = [];
        if (!is_array($data)) {
            $errors['data'] = 'Invalid data format.';
            return $errors;
        }

        if (!$data['productID']) {
            $errors['productID'] = 'Product ID is required.';
        }

        return $errors;
    }
}
