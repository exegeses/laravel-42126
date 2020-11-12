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

Route::get('/agregarRegion', function(){
    return view('agregarRegion');
});

Route::post('/agregarRegion', function (){
    $regNombre = $_POST['regNombre'];
/*
    DB::insert(
            'INSERT INTO regiones
                    VALUES ( :regNombre )' , [$regNombre]
    );
*/
    DB::table('regiones')->insert(
                                [ 'regNombre'=>$regNombre ]
                            );
    return redirect('/adminRegiones')
            ->with('mensaje', 'Región: '.$regNombre.' agregada correctamente.');
});

Route::get('/modificarRegion/{regID}', function ($regID) {
    // obtener datos de la región según $regID
    /*
    $region = DB::select('SELECT regID, regNombre
                            FROM regiones
                            WHERE regID = ?', [$regID]);

    $region = DB::select('SELECT regID, regNombre
                            FROM regiones
                            WHERE regID = :id', [ ':id'=>$regID] );
    */
    $region = DB::table('regiones')
                    ->where('regID', $regID)
                    ->first();
    // mostrar el form con datos de región
    return view('modificarRegion', [ 'region'=>$region ]);
});

Route::post('/modificarRegion', function () {
    $regNombre = $_POST['regNombre'];
    $regID = $_POST['regID'];
    /*
    DB::update( 'UPDATE regiones
                   SET regNombre = :regNombre
                   WHERE regID = :regID',
                    [ ':regNombre'=>$regNombre, ':regID'=>$regID ]
        );
    */
    DB::table('regiones')
            ->where('regID', $regID)
            ->update( [ 'regNombre'=>$regNombre ] );

    return redirect('/adminRegiones')
                ->with('mensaje', 'Región: '.$regNombre,' modificada correctamente.');

});

Route::get('/eliminarRegion/{regID}', function($regID){
    $region = DB::table('regiones')
                    ->where('regID', $regID)
                    ->first();
    return view('eliminarRegion', [ 'region'=>$region ]);
});

Route::post('/eliminarRegion', function () {
    $regID = $_POST['regID'];
    $regNombre = $_POST['regNombre'];
    /*
        DB::delete(
                'DELETE FROM  regiones
                  WHERE regID = :regID',
                      [':regID'=>$regID]
                   );
    */
    DB::table('regiones')
        ->where('regID',$regID)
        ->delete();
    return redirect('/adminRegiones')
        ->with('mensaje', 'Región: '.$regNombre.' eliminada correctamente.');

});

#################################
#####   CRUD de Destinos

Route::get('/adminDestinos', function () {
    //obtener listado de destinos
    /*
    $destinos = DB::select('SELECT
                                d.destID, d.destNombre,
                                r.regNombre, d.destPrecio
                                FROM destinos AS d
                                INNER JOIN regiones AS r
                                      ON r.regID = d.regID
                            ');
    */
    $destinos = DB::table('destinos AS d')
                        ->join('regiones AS r', 'd.regID', '=', 'r.regID')
                        ->get();

    //pasar listado a la vista
    return view('adminDestinos', [ 'destinos'=>$destinos ]);
});

Route::get('/agregarDestino', function(){
    //obtener listado de regiones
    $regiones = DB::table('regiones')->get();
    //pasar datos
    return view('agregarDestino', [ 'regiones'=>$regiones ]);
});

Route::post('/agregarDestino', function () {
    //capturamos detos desde el form
    $destNombre = $_POST['destNombre'];
    $destPrecio = $_POST['destPrecio'];
    $regID = $_POST['regID'];
    $destAsientos = $_POST['destAsientos'];
    $destDisponibles = $_POST['destDisponibles'];
    $destActivo = $_POST['destActivo'];

    //insertamos datos en tabla
    DB::table('destinos')
            ->insert(
                [
                 'destNombre'=>$destNombre,
                 'destPrecio'=>$destPrecio,
                 'regID'=>$regID,
                 'destAsientos'=>$destAsientos,
                 'destDisponibles'=>$destDisponibles,
                 'destActivo'=>$destActivo
                ]
            );
    return redirect('/adminDestinos')
            ->with('mensaje', 'Destino: '.$destNombre.' agregado correctamente.');
});
