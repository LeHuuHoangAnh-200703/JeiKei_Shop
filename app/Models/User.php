<?php

namespace App\Models;

use App\Models\Order;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'customers';
    protected $fillable = ['name', 'email', 'password', 'phone', 'address','image', 'created_at'];

    public function orders()
    {
        return $this->hasMany(Order::class, 'user_id');
    }
    public static function validate(array $data)
    {
        $errors = [];
        if ($data['name'] == "") {
            $errors['name'] = 'Tên không hợp lệ.';
        } 

        if (!$data['email']) {
            $errors['email'] = 'Email không hợp lệ.';
        } elseif (static::where('email', $data['email'])->count() > 0) {
            $errors['email'] = 'Email đã được sử dụng.';
        }

        if (strlen($data['password']) < 6) {
            $errors['password'] = 'Mật khẩu phải có ít nhất 6 ký tự.';
        } elseif ($data['password'] != $data['password_confirmation']) {
            $errors['password'] = 'Xác nhận mật khẩu không khớp.';
        }

        if (!$data['phone']) {
            $errors["phone"] = "Số điện thoại không hợp lệ.";
        }

        if (!$data["address"]) {
            $errors["address"] = "Địa chỉ không hợp lệ.";
        }
        return $errors;
    }
}
