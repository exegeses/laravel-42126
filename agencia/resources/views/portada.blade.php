@extends('layouts.testPlantilla')

    @section('contenido')

        <h1>Tema de la página</h1>

        <ul>
        @foreach( $regiones as $region )
            <li>{{ $region->regNombre }}</li>
        @endforeach
        </ul>

    @endsection
