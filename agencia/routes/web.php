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

## enviando datos a la vista
Route::get('/estructuras', function (){
    $nombre = 'marcos';
    //pasar el dato $nombre a la vista
    // como array asociativo
    return view('estructuras', [ 'nombre'=>$nombre ] );
});

## trabajando con un form
Route::get('/formulario', function() {
    return view('formulario');
});
Route::post('/proceso', function () {
    $frase = $_POST['frase'];
    return view('proceso', [ 'frase'=>$frase ]);
});

## implementaciónde unaw plantilla blade
Route::get('/portada', function (){
    return view('portada');
});

## datos desde BDD
Route::get('/regiones', function () {
    $regiones = DB::table('regiones')->get();
    return view('portada', [ 'regiones'=>$regiones ] );
});

###########################
#### CRUD REGIONES
/** ## métodos Raw Sql
 *
 *  DB::select();
 *  DB::insert();
 *  DB::update();
 *  DB::delete();
 *
 * */
/** ## métodos fluent Query Builder
 *
 *      ::table('nTable')->get();
 *
 *      ::table('nTable')->select('campo, campo2')->get();
 *      ::table('nTable')->select('campo, campo2')
 *                              ->where(condicion)->get();
 *      ::table('nTable')->where(condicion)->get();
 *
 *      ::table('nTable')->insert([valores]);
 */

Route::get('/adminRegiones', function() {
    //traemos listado de regiones
    //$regiones = DB::select('SELECT regID, regNombre FROM regiones');
    $regiones = DB::table('regiones')->get();
    return view('adminRegiones', [ 'regiones'=>$regiones ]);
});


