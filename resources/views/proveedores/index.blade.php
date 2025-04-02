@extends("layouts.app")

@section("content")
    <div class="row justify-content-center my-5">
        <div class="col-md-7 text-center">
            <h1 class="alert alert-primary fw-bold">DETALLES PROVEEDORES</h1>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow-sm rounded">
                <div class="card-header bg-primary text-white text-center">
                    <h2 class="h5 mb-0">Listado de Proveedores</h2>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-hover">
                        <thead class="table-dark text-center">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">ID Proveedor</th>
                            <th scope="col">Nombre Empresa</th>
                            <th scope="col">Contacto Nombre</th>
                            <th scope="col">Telefono</th>
                            <th scope="col">Email</th>
                            <th scope="col">Direccion</th>
                            <th scope="col">RUC</th>
                            <th scope="col">Fecha Registro</th>
                            <th scope="col">Estado</th>
                        </tr>
                        </thead>
                        <tbody class="text-center">
                        @foreach($proveedores as $proveedor)
                            <tr>
                                <td>{{$loop->index+1}}</td>
                                <td>{{$proveedor->id_proveedor}}</td>
                                <td>{{$proveedor->nombre_empresa}}</td>
                                <td>{{$proveedor->contacto_nombre}}</td>
                                <td>{{$proveedor->telefono}}</td>
                                <td>{{$proveedor->email}}</td>
                                <td>{{$proveedor->direccion}}</td>
                                <td>{{$proveedor->ruc}}</td>
                                <td>{{$proveedor->fecha_registro}}</td>
                                <td>{{$proveedor->estado}}</td>
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
