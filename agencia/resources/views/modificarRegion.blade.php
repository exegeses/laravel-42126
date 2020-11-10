@extends('layouts.plantilla')

    @section('contenido')

        <h1>Modificación de una región</h1>

        <div class="bg-light shadow-sm col-8 mx-auto p-4">
            <form action="/modificarRegion" method="post">
                @csrf
                <label for="regNombre">
                    Nombre de la región:
                </label>
                <input type="text"
                       value="{{ $region->regNombre }}"
                       name="regNombre" id="regNombre"
                       class="form-control"> <br>
                <input type="hidden" name="regID"
                       value="{{ $region->regID }}">
                <button class="btn btn-dark">
                    Modificar región
                </button>
                <a href="/adminRegiones" class="btn btn-outline-secondary ml-3">
                    volver a panel
                </a>
            </form>
        </div>

    @endsection

