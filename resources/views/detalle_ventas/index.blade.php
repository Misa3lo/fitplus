@extends("layouts.app")

@section("content")
    <div class="row justify-content-center my-5">
        <div class="col-md-7 text-center">
            <h1 class="alert alert-primary fw-bold">DETALLES VENTAS</h1>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow-sm rounded">
                <div class="card-header bg-primary text-white text-center">
                    <h2 class="h5 mb-0">Listado de Detalles</h2>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-hover">
                        <thead class="table-dark text-center">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">ID Detalle</th>
                            <th scope="col">ID Venta</th>
                            <th scope="col">ID Producto</th>
                            <th scope="col">Cantidad</th>
                            <th scope="col">Precio Unitario</th>
                            <th scope="col">Subtotal</th>
                        </tr>
                        </thead>
                        <tbody class="text-center">
                        @foreach($detalles_ventas as $detalle_venta)
                            <tr>
                                <td>{{$loop->index+1}}</td>
                                <td>{{$detalle_venta->id_detalle}}</td>
                                <td>{{$detalle_venta->id_venta}}</td>
                                <td>{{$detalle_venta->id_producto}}</td>
                                <td>{{$detalle_venta->cantidad}}</td>
                                <td>{{$detalle_venta->precio_unitario}}</td>
                                <td>{{$detalle_venta->subtotal}}</td>
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
