<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserAuthController;

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

Route::get('/', [UserAuthController::class, 'login']);
Route::get('login',[UserAuthController::class, 'login']);
Route::post('check',[UserAuthController::class, 'check'])->name('auth.check');
Route::get('dashbord_dtn',[UserAuthController::class, 'dashbord_dtn']);
Route::get('dashbord_en',[UserAuthController::class, 'dashbord_en']);
Route::get('dashbord_pp',[UserAuthController::class, 'dashbord_pp']);
Route::get('dashbord_j',[UserAuthController::class, 'dashbord_j']);
Route::get('Logout',[UserAuthController::class, 'Logout']);
