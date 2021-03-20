<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpleadoController;

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
    return view('auth.login');
});


Route::resource('/empleado', 'EmpleadoController');

Auth::routes();

# rotta pubblica
Route::get('/home', 'EmpleadoController@index')->name('home');

# si attiva quando si autentica utente e lo porta della rotta
Route::prefix('auth')->group(function () {
    Route::get('/', 'EmpleadoController@index')->name('home');
});


