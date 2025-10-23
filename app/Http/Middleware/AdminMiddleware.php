<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle($request, Closure $next)
    {
        if (!Auth::check()) {
            return redirect('/login')->with('error', 'Vui lòng đăng nhập trước.');
        }

        if (Auth::user()->is_admin !== true) {
            return redirect('/')->with('error', 'Bạn không có quyền truy cập khu vực này.');
        }

        return $next($request);
    }
}
