<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;

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

//Index de cadastramento
Route::get('cadastro',[FormController::class,"index"]);

//Método de Cadastro Cliente e Contatos
Route::post('/sendform/client',[FormController::class,"clientformsend"]);
Route::post('/sendform/clientup',[FormController::class,"clientformupdate"]);

Route::post('/sendform/contato',[FormController::class,"clientformsend"]);
