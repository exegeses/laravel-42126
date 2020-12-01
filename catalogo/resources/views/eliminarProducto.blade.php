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
                Precio: ${{ $producto->prdPrecio }}
                <form action="/eliminarProducto" method="post">
                @csrf
                @method('delete')

                    <input type="hidden" name="idProducto"
                           value="{{ $producto->idProducto }}">
                    <input type="hidden" name="prdNombre"
                           value="{{ $producto->prdNombre }}">

                    <button class="btn btn-danger btn-block my-3">
                        Confirmar baja
                    </button>
                    <a href="/adminProductos" class="btn btn-light btn-block">
                        Volver al panel
                    </a>
                </form>
            </div>
        </div>

        <script>
            Swal.fire(
                'Advertencia',
                'Si pulsa "Confirmar baja", se eliminará el producto',
                'warning'
            )
        </script>

    @endsection

