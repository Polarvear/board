<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\ProductController;
use \App\Http\Controllers\UploadController;
use \App\Http\Controllers\HomeController;
use \App\Http\Controllers\GoogleAuthController;
use \App\Http\Controllers\CommentsController;
use App\Models\comments;
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

//댓글 삭제
Route::post('/comments/destroy', [App\Http\Controllers\CommentsController::class, 'destroy'])->name('comment.delete');
//댓글 수정
Route::post('/comments/update', [App\Http\Controllers\CommentsController::class, 'update'])->name('comment.update');
//댓글 상태 변경
Route::post('/comments/status', [App\Http\Controllers\CommentsController::class, 'status'])->name('comment.status');
Route::post('/comments/status', [App\Http\Controllers\CommentsController::class, 'status'])->name('comment.status1');
//댓글 상태 변경
// Route::post('/comments/status', [App\Http\Controllers\CommentsController::class, 'status'])->name('comment.status');

// Route::post('/comments/delete', [App\Http\Controllers\CommentsController::class, 'delete'])->name('comment.delete');
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


Route::get('/admin/manage', [App\Http\Controllers\AdminManageController::class, 'index'])->name('admin.manage.index');

Route::get('/admin/pages', [App\Http\Controllers\AdminPagesController::class, 'index'])->name('admin.pages.index');
Route::get('/admin/pages/create', [App\Http\Controllers\AdminPagesController::class, 'create'])->name('admin.pages.create');

Route::delete('/admin/manage/{user}', [App\Http\Controllers\AdminManageController::class, 'destroy'])->name('admin.manage.destroy');
// Route::get('/admin/settings', 'AdminSettingsController@index')->name('admin.settings.index');

Route::get('/userSearch', [App\Http\Controllers\AdminPagesController::class, 'userSearch'])->name('admin.pages.userSearch');
Route::get('/emailSearch', [App\Http\Controllers\AdminPagesController::class, 'emailSearch'])->name('admin.pages.emailSearch');
Route::get('/phoneSearch', [App\Http\Controllers\AdminPagesController::class, 'phoneSearch'])->name('admin.pages.phoneSearch');


Route::post('/store', [App\Http\Controllers\AdminPagesController::class, 'store'])->name('admin.pages.store');
Route::patch('/admin/pages/{product}', [App\Http\Controllers\AdminPagesController::class, 'update'])->name('admin.pages.update');

//네이버 로그인
// Route::get('auth/naver/redirect', 'Auth\LoginController@redirectToNaver');
// Route::get('/auth/naver/redirect', 'Auth\NaverController@redirect')->name('auth.naver.redirect');
// Route::get('/auth/naver/redirect', 'Auth\NaverController@redirect')->name('auth.naver.redirect');
// Route::get('auth/naver/callback', 'Auth\LoginController@handleNaverCallback');


Route::get('/auth/naver/redirect', 'Auth\NaverController@redirect')->name('auth.naver.redirect');
Route::get('/auth/naver/callback', 'Auth\NaverController@callback')->name('auth.naver.callback');

Route::get('auth/google', [App\Http\Controllers\GoogleAuthController::class,'redirect'])->name('google-auth');
Route::get('auth/google/call-back', [App\Http\Controllers\GoogleAuthController::class,'callbackGoogle']);
