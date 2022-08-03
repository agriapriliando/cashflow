<?php

use App\Http\Controllers\ActController;
use App\Http\Controllers\JenController;
use App\Http\Controllers\LoginController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', [LoginController::class, 'index']);
Route::get('/', [ActController::class, 'index']);

Route::get('jenis', [JenController::class, 'index']);
Route::post('jenis', [JenController::class, 'store']);
Route::get('jenis/{jen}', [JenController::class, 'edit']);
Route::patch('jenis/{jen}', [JenController::class, 'update']);
Route::delete('jenis/{jen}', [JenController::class, 'delete']);

Route::post('act', [ActController::class, 'store']);
Route::delete('act/{act}', [ActController::class, 'delete']);
Route::get('act/{act}', [ActController::class, 'edit']);
Route::patch('act/{act}', [ActController::class, 'update']);