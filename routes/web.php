<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('dashboard', function(){
return view('admin.dashboard');

});
// change user pass

Route::get('password-change', [App\Http\Controllers\Auth\ChangePasswordController::class, 'index'])->name('password.change');
Route::post('password-change', [App\Http\Controllers\Auth\ChangePasswordController::class, 'changePass'])->name('change.user.pass');

// user profile settings

Route::get('user-profile-settings', [App\Http\Controllers\Auth\UserProfileSettingsController::class, 'index'])->name('user.profile.settings');
Route::post('user-profile-update', [App\Http\Controllers\Auth\UserProfileSettingsController::class, 'userProfileUpdate'])->name('user.profile.update');
Route::post('user-profile-update-quick', [App\Http\Controllers\Auth\UserProfileSettingsController::class, 'userProfileUpdateQuick'])->name('user.profile.update.quick');

// User crud

Route::resource('user', 'App\Http\Controllers\UserController');
Route::get('user/trash/{id}', 'App\Http\Controllers\UserController@trash')-> name('user.trash');
Route::get('user-trash', 'App\Http\Controllers\UserController@trashData')-> name('user.trash.all');


// Role crud

Route::resource('role', 'App\Http\Controllers\RoleController');

// Tag routes

Route::resource('tag', 'App\Http\Controllers\TagController');
Route::get('tag-status/{id}', 'App\Http\Controllers\TagController@tagStatus')-> name('tag.status');



// Category routes

Route::resource('category', 'App\Http\Controllers\CategoryController');
Route::get('category-status/{id}', 'App\Http\Controllers\CategoryController@catStatus')-> name('cat.status');


// post routes

Route::resource('post', 'App\Http\Controllers\PostController');
Route::get('post-status/{id}', 'App\Http\Controllers\PostController@postStatus')-> name('post.status');
Route::get('test', 'App\Http\Controllers\CategoryController@test');

Route::get('blog','App\Http\Controllers\Comet\BlogPageController@showBlog');


