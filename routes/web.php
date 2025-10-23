<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\VehicleController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Đây là nơi khai báo route cho website.
| Laravel sẽ tự động tải file này qua RouteServiceProvider.
|
*/

// ----------------- TRANG NGƯỜI DÙNG -----------------
Route::get('/', function () {
    return view('home');
});
Route::view('/dangnhap', 'dangnhap');
Route::view('/dangky', 'dangky');  

Route::get('/phuongtien', function () {
    return view('QLPT');
});
Route::get('/khachhang', function () {
    return view('QLKH');
});
Route::get('/thanhtoan', function () {
    return view('ThanhToan');
});
Route::get('/hopdong', function () {
    return view('QLHD');
});
Route::get('/baocao', function () {
    return view('BaoCao');
});

// ----------------- TRANG ADMIN -----------------
Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');
        Route::get('/users', [UserController::class, 'index'])->name('admin.users');
        Route::get('/vehicles', [VehicleController::class, 'index'])->name('admin.vehicles');
});

require __DIR__.'/auth.php';
