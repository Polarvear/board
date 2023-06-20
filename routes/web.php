<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\ProductController;
use \App\Http\Controllers\UploadController;
use \App\Http\Controllers\HomeController;
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
    return view('welcome');
});

Route::get('/products', function () {
  return view('index');
});
// products 로 get 요청이 올 경우 ProductController 의 index 함수를 실행합니다.
// name 은 별명으로 나중에 route('product.index') 로 쉽게 주소 출력이 가능합니다.



Auth::routes();
// products 로 get 요청이 올 경우 ProductController 의 index 함수를 실행합니다.
// name 은 별명으로 나중에 route('product.index') 로 쉽게 주소 출력이 가능합니다.
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/products', [App\Http\Controllers\ProductController::class, 'index'])->name('products.index');
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/products/store', [ProductController::class, 'store'])->name('products.store');
Route::get('products/{product}',[ProductController::class, 'show'])->name("products.show");
// 수정 페이지
Route::get('products/{product}/edit', [ProductController::class, 'edit'])->name("products.edit");
// Laravel에서 업데이트의 대한 메서드로는 Patch 또는 Put을 권장합니다.
Route::patch('products/{product}', [ProductController::class, 'update'])->name('products.update');
Route::delete('products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');

//아래 두개 라우트 실험용 라우트임
Route::view('upload', 'upload');
Route::post('upload', [UploadController::class, 'index']);


// Auth::routes(); // 일단 주석처리

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//ajax 처리기
Route::post('/ajaxRequest', 'App\Http\Controllers\ProductController@ajaxRequest')->name('product.ajaxRequest');

Route::get('/user-info', [App\Http\Controllers\JobsController::class, 'index'])->name('user-info');

//댓글등록
Route::post('/comments/store', [App\Http\Controllers\CommentsController::class, 'store'])->name('comment.add');
// Route::post('/comments/store', 'App\Http\Controllers\CommentsController@store')->name('comment.add');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');




Route::middleware(['auth', 'user-access:user'])->group(function () {

    Route::get('/home', [HomeController::class, 'index'])->name('home');
});

Route::middleware(['auth', 'user-access:admin'])->group(function () {

    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin.home');
});

Route::middleware(['auth', 'user-access:manager'])->group(function () {

    Route::get('/manager/home', [HomeController::class, 'managerHome'])->name('manager.home');
});


Route::get('/admin/settings', [App\Http\Controllers\AdminSettingsController::class, 'index'])->name('admin.settings.index');

Route::get('/admin/pages', [App\Http\Controllers\AdminPagesController::class, 'index'])->name('admin.pages.index');
// Route::get('/admin/settings', 'AdminSettingsController@index')->name('admin.settings.index');
