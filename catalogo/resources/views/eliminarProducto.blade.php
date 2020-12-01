@extends('layouts.plantilla')

    @section('contenido')

        <h1>Baja de un producto</h1>

        <div class="row alert bg-light border-danger col-8 mx-auto p-1">
            <div class="col">
                <img src="/productos/{{ $producto->prdImagen }}" class="img-thumbnail">
            </div>
            <div class="col text-danger align-self-center">
                <h2>{{ $producto->prdNombre }}</h2>
                Categoría: {{ $producto->relCategoria->catNombre }}<br>
                Marca: {{ $producto->relMarca->mkNombre }}<br>
                Presentación: {{ $producto->prdPresentacion }}<br>
                Precio: {{ $producto->prdPrecio }}
            </div>
        </div>

    @endsection

