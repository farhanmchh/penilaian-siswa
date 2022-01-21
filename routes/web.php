<?php

use App\Http\Controllers\IndexController;
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

Route::get('/', [IndexController::class, 'index']);
Route::post('/login_admin', [IndexController::class, 'loginAdmin']);
Route::post('/login_guru', [IndexController::class, 'loginGuru']);
Route::post('/login_siswa', [IndexController::class, 'loginSiswa']);
Route::get('/main', [IndexController::class, 'main']);
