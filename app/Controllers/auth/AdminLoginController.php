<?php

namespace App\Controllers\Auth;

use App\Models\Admin;
use App\Controllers\Controller;
use App\SessionGuard as Guard;

class AdminLoginController extends Controller
{
    public function create()
    {
        if (Guard::isAdminLoggedIn()) {
            redirect('/admin');
        }
        $data = [
            'messages' => session_get_once('messages'),
            'old' => $this->getSavedFormValues(),
            'errors' => session_get_once('errors'),
            'checkLogin' => session_get_once("checkLogin")
        ];

        $this->sendPage('auth/adminlogin', $data);
    }

    public function store()
    {
        $admin_credentials = $this->filterUserCredentials($_POST);
        $errors = [];
        $adminIvalid = filter_var($admin_credentials['email'], FILTER_VALIDATE_EMAIL);
        $admin = Admin::where('email', $admin_credentials['email'])->first();
        if (!$admin || !$adminIvalid) {
            $errors['email'] = 'Email không hợp lệ.';
        } else if (Guard::adminlogin($admin, $admin_credentials)) {
            redirect('/admin');
        }else {
            $errors['password'] = 'Mật khẩu không hợp lệ.';
        }
        // Đăng nhập không thành công: lưu giá trị trong form, trừ password
        $this->saveFormValues($_POST, ['password']);
        redirect('/admin/login', ['errors' => $errors]);
    }

    public function destroy()
    {
        Guard::Adminlogout();
        redirect('/admin/login');
    }

    protected function filterUserCredentials(array $data)
    {
        return [
            'email' => filter_var($data['email'], FILTER_VALIDATE_EMAIL),
            'password' => $data['password'] ?? null
        ];
    }
}
