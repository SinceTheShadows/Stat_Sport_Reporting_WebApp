<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\DtnController;
use App\Http\Controllers\EnController;
use App\Http\Controllers\PpController;
use App\Http\Controllers\JController;

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
//Logout
Route::get('Logout',[UserAuthController::class, 'Logout']);
Route::get('welcome',[UserAuthController::class, 'welcome']);


//dtn routing
Route::get('dashbord_dtn_dtn',[DtnController::class, 'dashbord_dtn_dtn']);
Route::get('dashbord_dtn_en',[DtnController::class, 'dashbord_dtn_en']);
Route::get('dashbord_dtn_pp',[DtnController::class, 'dashbord_dtn_pp']);
Route::get('dashbord_dtn_j',[DtnController::class, 'dashbord_dtn_j']);
Route::get('dashbord_dtn_form',[DtnController::class, 'dashbord_dtn_form']);

//en routing
Route::get('dashbord_en_dtn',[EnController::class, 'dashbord_en_dtn']);
Route::get('dashbord_en_en',[EnController::class, 'dashbord_en_en']);
Route::get('dashbord_en_pp',[EnController::class, 'dashbord_en_pp']);
Route::get('dashbord_en_j',[EnController::class, 'dashbord_en_j']);
Route::get('dashbord_en_form',[EnController::class, 'dashbord_en_form']);

//pp routing
Route::get('dashbord_pp_dtn',[PpController::class, 'dashbord_pp_dtn']);
Route::get('dashbord_pp_en',[PpController::class, 'dashbord_pp_en']);
Route::get('dashbord_pp_pp',[PpController::class, 'dashbord_pp_pp']);
Route::get('dashbord_pp_j',[PpController::class, 'dashbord_pp_j']);
Route::get('dashbord_pp_form',[PpController::class, 'dashbord_pp_form']);

//j Routing
Route::get('dashbord_j_dtn',[JController::class, 'dashbord_j_dtn']);
Route::get('dashbord_j_j',[JController::class, 'dashbord_j_j']);
Route::get('dashbord_j_form',[JController::class, 'dashbord_j_form']);

