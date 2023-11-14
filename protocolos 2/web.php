<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::get('/cadastroLogin', 'App\Http\Controllers\Controlador@formLogin');

Route::post('/', 'App\Http\Controllers\Controlador@preencheLogin' ) -> name ('formularioLogin');

Route::post('/paginaInicial', 'App\Http\Controllers\Controlador@validaLogin' ) -> name ('validaLogin');