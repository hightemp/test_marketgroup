<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\SiteController;
use App\Http\Controllers\UserController;

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

Route::get('/', [SiteController::class, 'index'])->name('home');

Route::get('/login', [SiteController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [SiteController::class, 'login'])->name('login');

Route::post('/logout', [SiteController::class, 'logout'])->name('logout');

Route::get('/user', [UserController::class, 'index'])->name('user.index');
// Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
// Route::post('/user', [UserController::class, 'store'])->name('user.store');
Route::get('/user/{employee}', [UserController::class, 'show'])->name('user.show');
Route::get('/user/{employee}/edit', [UserController::class, 'edit'])->name('user.edit');
Route::put('/user/{employee}', [UserController::class, 'update'])->name('user.update');
Route::delete('/user/{employee}', [UserController::class, 'destroy'])->name('user.destroy');