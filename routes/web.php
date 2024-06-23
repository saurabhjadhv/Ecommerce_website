<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\LogoutController;
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
    return view('auth.register');
});

Route::post('/registration', [ProductController::class, 'registration'])->name('registration');

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::post('/userlogin', [ProductController::class, 'login'])->name('userlogin');

Route::get('/dashboard', [ProductController::class, 'navbar'])->name('navbar');
Route::post('/dashboard/{id}/uploadProfilePhoto', [ProductController::class, 'uploadProfilePhoto'])->name('uploadProfilePhoto');

Route::get('/dashboard/form', [ProductController::class, 'showForm'])->name('form');
Route::post('/dashboard/form', [ProductController::class, 'productform'])->name('productform');

Route::get('/updateform/{id}', [ProductController::class, 'edit'])->name('updateform');

Route::put('/updateformList/{id}', [ProductController::class, 'updateform'])->name('updateformList');

Route::delete('/deletedata/{id}', [ProductController::class, 'destroy'])->name('deletedata');

// routes/web.php
Route::middleware('auth')->group(function () {
    Route::get('/logout', [LogoutController::class, 'logoutwebsite'])->name('logout');
});