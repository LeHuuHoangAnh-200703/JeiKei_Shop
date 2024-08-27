<?php

namespace App\Controllers\Auth;

use App\Models\User;
use App\Controllers\Controller;
use App\SessionGuard as Guard;

class LoginController extends Controller
{ 
    public function create()
    {
        if (Guard::isUserLoggedIn()) {
            redirect('/home');
            echo "Create running";
        }
        $data = [
            'messages' => session_get_once('messages'),
            'old' => $this->getSavedFormValues(),
            'errors' => session_get_once('errors')
        ];

        $this->sendPage('auth/login', $data);
    }

    public function store()
    {
        $user_credentials = $this->filterUserCredentials($_POST);
        $errors = [];
        $emailIvalid = filter_var($user_credentials['email'], FILTER_VALIDATE_EMAIL);
        $user = User::where('email', $user_credentials['email'])->first();

        if ($user_credentials['email'] === "" || $user_credentials['password'] === "") {
            $errors['email'] = "Email không hợp lệ.";
            $errors['password'] = "Mật không hợp lệ.";
        }else if (!$user || !$emailIvalid) {
            $errors['email'] = 'Email không hợp lệ.';
        }else if (Guard::login($user, $user_credentials)) {
            redirect('/home');
        } else {
            $errors['password'] = 'Mật khẩu không hợp lệ.';
        }

        // Đăng nhập không thành công: lưu giá trị trong form, trừ password
        $this->saveFormValues($_POST, ['password']);
        redirect('/login', ['errors' => $errors]);
    }

    public function destroy()
    {
        $userId = Guard::user()->id;
        if ($userId) {
            $user = User::find($userId);
            if ($user) {
                $user->is_online = 0;
                $user->save();
            }
        }
        Guard::logout();
        redirect('/login');
    }

    protected function filterUserCredentials(array $data)
    {
        return [
            'email' => filter_var($data['email'], FILTER_VALIDATE_EMAIL),
            'password' => $data['password'] ?? null
        ];
    }
}
