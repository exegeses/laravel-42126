@extends('layouts.plantilla')

    @section('contenido')

        <h1>Baja de una región</h1>

        <div class="alert bg-light border-danger col-6 mx-auto p-4">
            <form action="/eliminarRegion" method="post">
                @csrf
                Región: <span class="lead">{{ $region->regNombre }}</span>
                <input type="hidden" name="regNombre"
                       value="{{ $region->regNombre }}">
                <input type="hidden" name="regID"
                       value="{{ $region->regID }}">
                <button class="btn btn-danger btn-block my-2">
                    Confirmar baja
                </button>
                <a href="/adminRegiones" class="btn btn-outline-secondary my-2 btn-block">
                    volver a panel
                </a>
            </form>
        </div>

        <script>
            Swal.fire(
                'Advertencia!',
                'Confirmar baja eliminará la región seleccionada.',
                'warning'
            )
        </script>

    @endsection

