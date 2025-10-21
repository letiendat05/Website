<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
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
require __DIR__.'/auth.php';
