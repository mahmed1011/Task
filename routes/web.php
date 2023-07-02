<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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

    // Show All Users Data
    Route::get('all-users', [HomeController::class, 'index'])->name('users');
    Route::get('create-user', [HomeController::class, 'create'])->name('create.user');
    Route::post('store-user', [HomeController::class,  'store'])->name('store.user');
    Route::post('store-user/{id}', [HomeController::class,  'store'])->name('store.user');
    Route::get('edit-user/{id}', [HomeController::class, 'edit'])->name('edit.user');
    Route::get('delete-user/{id}', [HomeController::class, 'destroy'])->name('delete.user');
