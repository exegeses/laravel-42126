@extends('layouts.testPlantilla')

    @section('contenido')

        <h1>Tema de la página</h1>

        @if( !isset($regiones) )
            No se han encontrado regiones.
        @else
            <ul>
            @foreach( $regiones as $region )
                <li>{{ $region->regNombre }}</li>
            @endforeach
            </ul>
        @endif

    @endsection
