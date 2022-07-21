<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\siswaController;
use App\Http\Controllers\nilaiController;
use App\Http\Controllers\jurusanController;
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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('post',PostController::class);

Route::resource('siswa',siswaController::class);

Route::resource('nilai',nilaiController::class);

Route::resource('jurusan',jurusanController::class);
