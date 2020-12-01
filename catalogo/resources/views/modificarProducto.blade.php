@extends('layouts.plantilla')

@section('contenido')


        <h1>Modificación de un producto</h1>

        <div class="alert bg-light border border-white shadow round col-8 mx-auto p-4">

            <form action="/modificarProducto" method="post" enctype="multipart/form-data">
            @method('put')
            @csrf
                Nombre: <br>
                <input type="text" name="prdNombre"
                       value="{{ $producto->prdNombre }}"
                       class="form-control">
                <br>
                Precio: <br>
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text">$</div>
                    </div>
                    <input type="number" name="prdPrecio" step="0.01"
                           value="{{ $producto->prdPrecio }}"
                           class="form-control">
                </div>
                <br>
                Marca: <br>
                <select name="idMarca" class="form-control" required>
                    <option value="{{ $producto->idMarca }}">{{ $producto->relMarca->mkNombre }}</option>
                @foreach ( $marcas as $marca )
                    <option value="{{ $marca->idMarca }}">{{ $marca->mkNombre }}</option>
                @endforeach
                </select>
                <br>
                Categoría: <br>
                <select name="idCategoria" class="form-control" required>
                    <option value="{{ $producto->idCategoria }}">{{ $producto->relCategoria->catNombre }}</option>
                @foreach ( $categorias as $categoria )
                    <option value="{{ $categoria->idCategoria }}">{{ $categoria->catNombre }}</option>
                @endforeach
                </select>
                <br>
                Presentacion: <br>
                <textarea name="prdPresentacion" class="form-control">{{ $producto->prdPresentacion }}</textarea>
                <br>
                Stock: <br>
                <input type="number" name="prdStock"
                       value="{{ $producto->prdStock }}"
                       class="form-control" min="0">
                <br>
                Imagen Actual:
                <img src="/productos/{{ $producto->prdImagen }}" class="img-thumbnail">
                <br>
                Reemplazar: <br>

                <div class="custom-file mt-1 mb-4">
                    <input type="file" name="prdImagen"  class="custom-file-input" id="customFileLang" lang="es">
                    <label class="custom-file-label" for="customFileLang" data-browse="Buscar en disco">Seleccionar Archivo: </label>
                </div>

                <input type="hidden" name="imagenActual"
                       value="{{ $producto->prdImagen }}">
                <input type="hidden" name="idProducto"
                       value="{{ $producto->idProducto }}">
                <br>
                <button class="btn btn-dark mb-3">Modificar producto</button>
                <a href="/adminProductos" class="btn btn-outline-secondary mb-3">Volver al panel de Productos</a>
            </form>

        </div>

        @if ($errors->any())

            <ul class="list-group col-8 mx-auto">
                <li class="list-group-item bg-light text-danger">
                    <i class="fas fa-exclamation-triangle mr-2"></i>
                    Se encontraron errores:
                </li>
                @foreach ($errors->all() as $error)
                    <li class="list-group-item list-group-item-danger">
                        <i class="fas fa-exclamation-circle mr-2"></i>
                        {{ $error }}
                    </li>
                @endforeach
            </ul>

        @endif

   @endsection

