@extends("layouts.app")

@section("content")
    <div class="row justify-content-center my-5">
        <div class="col-md-7 text-center">
            <h1 class="alert alert-primary fw-bold">DETALLES PRODUCTOS</h1>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow-sm rounded">
                <div class="card-header bg-primary text-white text-center">
                    <h2 class="h5 mb-0">Listado de Productos</h2>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-hover">
                        <thead class="table-dark text-center">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">ID Producto</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Descripcion</th>
                            <th scope="col">Precio</th>
                            <th scope="col">Stock</th>
                            <th scope="col">Categoria</th>
                            <th scope="col">Codigo Barras</th>
                            <th scope="col">Fecha Creacion</th>
                            <th scope="col">Estado</th>
                        </tr>
                        </thead>
                        <tbody class="text-center">
                        @foreach($productos as $producto)
                            <tr>
                                <td>{{$loop->index+1}}</td>
                                <td>{{$producto->id_producto}}</td>
                                <td>{{$producto->nombre}}</td>
                                <td>{{$producto->descipcion}}</td>
                                <td>{{$producto->precio}}</td>
                                <td>{{$producto->stock}}</td>
                                <td>{{$producto->categoria}}</td>
                                <td>{{$producto->codigo_barras}}</td>
                                <td>{{$producto->fecha_creacion}}</td>
                                <td>{{$producto->estado}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer text-center">
                    <small class="text-muted">Actualizado recientemente</small>
                </div>
            </div>
        </div>
    </div>
@endsection
