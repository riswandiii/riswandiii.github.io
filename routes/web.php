<?php

use App\Http\Controllers\DashboardCategoryController;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\DetailUserController;
use App\Http\Controllers\RegistrasiController;





/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home', [
        'title' => 'Home'
    ]);
});

Route::get('/about', function () {
    return view('about', [
        'title' => 'About Me',
        'name' => 'Riswandi',
        'alamat' => 'Makassar, Kab. Takalar',
        'ig' => 'riswandidl_',
        'fb' => 'Riswandi',
        'email' => 'riswandiandi017@gmail.com',
        'img' => 'agus.jpg'
    ]);
});

Route::get('/posts', [PostController::class, 'index']);

Route::get('/posts/{post:slug}', [PostController::class, 'show']);

Route::get('/categories', function(){
    return view('categories', [
        'title' => 'Post Categories',
        'categories' => Category::all()
    ]);
});

Route::get('/login', [LoginController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'cekLogin']);

Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/registrasi', [RegistrasiController::class, 'registrasi'])->middleware('guest');
Route::post('/registrasi', [RegistrasiController::class, 'create']);

Route::get('/dashboard', function(){
    return view('dashboard.index', [
        'title' => 'Dashboard',
        'active' => 'dashboard'
    ]);
})->middleware('auth');

//route untuk proses slug melalui javascript
Route::get('/dashboard/posts/slug', [DashboardPostController::class, 'slug'])->middleware('auth');

//route untuk tambah data dll
Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');

Route::resource('/dashboard/categories', DashboardCategoryController::class)->middleware('IsAdmin');

Route::get('/detail/user/{user:username}', [DetailUserController::class, 'detail'])->middleware('auth');
