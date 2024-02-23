<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $table = 'admins';
    protected $fillable = ['name', 'email', 'password'];

    public static function validate(array $data)
    {
        $errors = [];
        if (!$data["name"]) {
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
        return $errors;
    }
}
