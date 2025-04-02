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
                    <h2 class="h5 mb-0">Listado de Ventas</h2>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-hover">
                        <thead class="table-dark text-center">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">ID Venta</th>
                            <th scope="col">ID Cliente</th>
                            <th scope="col">Fecha Venta</th>
                            <th scope="col">Total</th>
                            <th scope="col">Metodo de Pago</th>
                            <th scope="col">Estado</th>
                        </tr>
                        </thead>
                        <tbody class="text-center">
                        @foreach($ventas as $venta)
                            <tr>
                                <td>{{$loop->index+1}}</td>
                                <td>{{$venta->id_venta}}</td>
                                <td>{{$venta->id_cliente}}</td>
                                <td>{{$venta->fecha_venta}}</td>
                                <td>{{$venta->total}}</td>
                                <td>{{$venta->metodo_pago}}</td>
                                <td>{{$venta->estado}}</td>
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
