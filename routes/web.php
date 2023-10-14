<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
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

Route::get('/', function (Request $request) {
    $data = $request->session()->get("user");
   
    if(!$data || !$data['isLogind']){
        return view('login');
    }
    return redirect("/user");
})->name("home");

Route::get('/register', function (Request $request) {
    $data = $request->session()->get("user");
   
    if(!$data || !$data['isLogind']){
        return view('register');
    }
    return redirect("/user");
})->name("register");

Route::post('/register',[AuthController::class, 'register'])-> name("register");

Route::get('/admin/users', function () {
    return view('register');
});

Route::get('/logout', [AuthController::class, 'logout'])-> name("logout");


Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::get('/user', [UserController::class, 'index'])->name('user.index');
Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
Route::post('/user', [UserController::class, 'store'])->name('user.store');
Route::get('/user/{user}/edit', [UserController::class, 'edit'])->name('user.edit');
Route::put('/user/{user}/update', [UserController::class, 'update'])->name('user.update');
Route::delete('/user/{user}/destroy', [UserController::class, 'destroy'])->name('user.destroy');