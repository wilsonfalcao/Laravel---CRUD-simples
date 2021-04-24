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
Route::get('cliente',[FormController::class,"cliente"]);
Route::get('contato',[FormController::class,"contato"]);

//Método de Cadastro Cliente e Contatos
//Clientes
Route::post('/sendform/client',[FormController::class,"clientformsend"]);
Route::post('/sendform/clientup',[FormController::class,"clientformupdate"]);
Route::post('/sendform/delete-client',[FormController::class,"clientdelete"]);
//Contatos
Route::post('/sendform/contato',[FormController::class,"contatoformsend"]);
Route::post('/sendform/contatup',[FormController::class,"contatoformupdate"]);
Route::post('/sendform/delete-contato',[FormController::class,"contatodelete"]);
