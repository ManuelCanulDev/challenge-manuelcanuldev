<?php

use App\Http\Controllers\ButacaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\SocioController;
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

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::resource('socios', SocioController::class);

Route::resource('reservas', ReservaController::class);

Route::resource('butacas', ButacaController::class);
