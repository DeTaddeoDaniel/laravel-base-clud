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

#middleware dice che entri solo con autenticazione, se non hai l'autenticazione ti manda fuori dalla sezione
Route::resource('/empleado', 'EmpleadoController')->middleware('auth');

# opzioni che vogliamo non far vedere
Auth::routes(['register'=>false, 'reset'=>false]);

# rotta pubblica
Route::get('/home', 'EmpleadoController@index')->name('home');

# si attiva quando si autentica utente e lo porta della rotta
Route::prefix('auth')->group(function () {
    Route::get('/', 'EmpleadoController@index')->name('home');
});


