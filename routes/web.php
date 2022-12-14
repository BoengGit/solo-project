<?php

use App\Http\Controllers\AdminController;
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

Route::get('/dashboard', function () {
    return view('admin.admin_index');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';

// Admin Controller
Route::controller(AdminController::class)->group(function(){
    Route::get('/admin/logout', 'destroy')->name('admin.logout')->middleware(['auth', 'verified']);
    Route::get('/admin/profile', 'Profile')->name('admin.profile')->middleware(['auth', 'verified']);
    Route::get('/admin/profile/edit', 'EditProfile')->name('edit.profile')->middleware(['auth', 'verified']);
    Route::post('/admin/profile/store', 'StoreProfile')->name('store.profile')->middleware(['auth', 'verified']);
    Route::get('/admin/password', 'ChangePassword')->name('change.password')->middleware(['auth', 'verified']);
    Route::post('/admin/password.update', 'UpdatePassword')->name('update.password')->middleware(['auth', 'verified']);
}); //End Method
