<?php

namespace App\Http\Controllers;

use App\Models\Marca;
use Illuminate\Http\Request;

class MarcaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $marcas = Marca::simplePaginate(7);
        return view('adminMarcas', [ 'marcas'=>$marcas ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('agregarMarca');
    }

    public function validar(Request $request)
    {
        //validamos con método validate
        $request->validate(
            [
                'mkNombre'=>'required|min:2|max:50'
            ],
            [
                'mkNombre.required'=>'El campo Nombre es obligatorio.',
                'mkNombre.min'=>'El campo Nombre de tener al menos 2 caractéres.',
                'mkNombre.max'=>'El campo Nombre de tener 50 caractéres como máximo.'
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //capturamos datos enviados por el form
        //$mkNombre = $_POST['mkNombre'];
        $mkNombre = $request->input('mkNombre');

        //validación
        $this->validar($request);

        //guardamos en BDD
        $Marca = new Marca;
        $Marca->mkNombre = $mkNombre;
        $Marca->save();
        //retornamos con mensaje de ok
        return redirect('/adminMarcas')
                    ->with('mensaje', 'Marca: '.$mkNombre.' agregada correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($idMarca)
    {
        // obtenemos datos de la marca por su id
        $Marca = Marca::find($idMarca);
        // retornamos la vista del form con los datos de la marca
        return view('modificarMarca', [ 'marca'=>$Marca ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //capturamos datos enviados por el form
        $mkNombre = $request->input('mkNombre');
        $idMarca = $request->input('idMarca');
        //validamos con el método validate
        $this->validar($request);
        //obtenemos datos de la marca por su id
        $Marca = Marca::find($idMarca);
        //modificamos
        $Marca->mkNombre = $mkNombre;
        $Marca->save();
        //redirigimos a una petición con mensaje
        return redirect('/adminMarcas')
                        ->with('mensaje', 'Marca: '.$mkNombre.' modificada correctmente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
