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

//dtn routing
Route::get('dashbord_dtn_dtn',[UserAuthController::class, 'dashbord_dtn_dtn']);
Route::get('dashbord_dtn_en',[UserAuthController::class, 'dashbord_dtn_en']);
Route::get('dashbord_dtn_pp',[UserAuthController::class, 'dashbord_dtn_pp']);
Route::get('dashbord_dtn_j',[UserAuthController::class, 'dashbord_dtn_j']);
Route::get('dashbord_dtn_form',[UserAuthController::class, 'dashbord_dtn_form']);

//en routing
Route::get('dashbord_en_dtn',[UserAuthController::class, 'dashbord_en_dtn']);
Route::get('dashbord_en_en',[UserAuthController::class, 'dashbord_en_en']);
Route::get('dashbord_en_pp',[UserAuthController::class, 'dashbord_en_pp']);
Route::get('dashbord_en_j',[UserAuthController::class, 'dashbord_en_j']);
Route::get('dashbord_en_form',[UserAuthController::class, 'dashbord_en_form']);

//pp routing
Route::get('dashbord_pp',[UserAuthController::class, 'dashbord_pp']);

//j Routing
Route::get('dashbord_j_dtn',[UserAuthController::class, 'dashbord_j_dtn']);
Route::get('dashbord_j_j',[UserAuthController::class, 'dashbord_j_j']);
Route::get('dashbord_j_form',[UserAuthController::class, 'dashbord_j_form']);

//Logout
Route::get('Logout',[UserAuthController::class, 'Logout']);
Route::get('welcome',[UserAuthController::class, 'welcome']);
