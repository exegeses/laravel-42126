<?php

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

//Route::get('peticion', 'acción');

Route::get('/peticion', function () {
    return 'petición ejecutada';
});

Route::get('/inicio', function(){
    return view('inicio');
});

Route::get('/estructuras', function (){
    $nombre = 'marcos';
    //pasar el dato $nombre a la vista
    // como array asociativo
    return view('estructuras', [ 'nombre'=>$nombre ] );
});

Route::get('/formulario', function(){
    return view('formulario');
});

