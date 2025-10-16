<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    // Hiển thị form login
    public function showLoginForm()
    {
        return view('dangnhap'); // tên file Blade
    }
    public function showRegisterForm() {
    return view('dangky'); // resources/views/dangky.blade.php
}


    // Xử lý form login
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        // Ví dụ: chỉ kiểm tra username/password cố định
        if ($request->username === 'admin' && $request->password === '123456') {
            return redirect()->intended('/home'); // trang sau khi login thành công
        }

        return back()->withErrors(['username' => 'Tài khoản hoặc mật khẩu không đúng']);
    }
}
