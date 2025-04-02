@extends("layouts.app")

@section("content")
    <div class="row justify-content-center my-5">
        <div class="col-md-7 text-center">
            <h1 class="alert alert-primary fw-bold">DETALLES CLIENTES</h1>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow-sm rounded">
                <div class="card-header bg-primary text-white text-center">
                    <h2 class="h5 mb-0">Listado de Clientes</h2>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-hover">
                        <thead class="table-dark text-center">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">ID Cliente</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Apellido</th>
                                <th scope="col">Email</th>
                                <th scope="col">Telefono</th>
                                <th scope="col">Direccion</th>
                                <th scope="col">Tipo Documento</th>
                                <th scope="col">Numero Documento</th>
                                <th scope="col">Fecha de Registro</th>
                                <th scope="col">Estado</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                        @foreach($clientes as $cliente)
                            <tr>
                                <td>{{$loop->index+1}}</td>
                                <td>{{$cliente->id_cliente}}</td>
                                <td>{{$cliente->nombre}}</td>
                                <td>{{$cliente->apellido}}</td>
                                <td>{{$cliente->email}}</td>
                                <td>{{$cliente->telefono}}</td>
                                <td>{{$cliente->direccion}}</td>
                                <td>{{$cliente->tipo_documento}}</td>
                                <td>{{$cliente->numero_documento}}</td>
                                <td>{{$cliente->fecha_registro}}</td>
                                <td>{{$cliente->estado}}</td>
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
