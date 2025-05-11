@extends("layouts.app")
@section("content")
    <div class="container">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">Editar Cliente</h4>
            </div>
            <div class="card-body">
                <form method="post" action="{{route('clientes.update',$cliente->id_cliente)}}">
                    @csrf
                    @method("PUT")

                    <div class="row mb-4">
                        <div class="col-md-6 mb-3">
                            <label for="nombre" class="form-label fw-bold">Nombre</label>
                            <input type="text" class="form-control" name="nombre" id="nombre"
                                   value="{{$cliente->nombre}}" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="apellido" class="form-label fw-bold">Apellido</label>
                            <input type="text" class="form-control" name="apellido" id="apellido"
                                   value="{{$cliente->apellido}}" required>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-6 mb-3">
                            <label for="email" class="form-label fw-bold">Email</label>
                            <input type="email" class="form-control" name="email" id="email"
                                   value="{{$cliente->email}}" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="telefono" class="form-label fw-bold">Teléfono</label>
                            <input type="tel" class="form-control" name="telefono" id="telefono"
                                   value="{{$cliente->telefono}}">
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="direccion" class="form-label fw-bold">Dirección</label>
                        <input type="text" class="form-control" name="direccion" id="direccion"
                               value="{{$cliente->direccion}}">
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-6 mb-3">
                            <label for="tipo_documento" class="form-label fw-bold">Tipo de Documento</label>
                            <select class="form-select" name="tipo_documento" id="tipo_documento" required>
                                <option value="DNI" {{$cliente->tipo_documento == 'DNI' ? 'selected' : ''}}>DNI</option>
                                <option value="RUC" {{$cliente->tipo_documento == 'RUC' ? 'selected' : ''}}>RUC</option>
                                <option value="Pasaporte" {{$cliente->tipo_documento == 'Pasaporte' ? 'selected' : ''}}>Pasaporte</option>
                                <option value="INE" {{$cliente->tipo_documento == 'INE' ? 'selected' : ''}}>INE</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="numero_documento" class="form-label fw-bold">Número de Documento</label>
                            <input type="text" class="form-control" name="numero_documento" id="numero_documento"
                                   value="{{$cliente->numero_documento}}" required>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-6 mb-3">
                            <label for="fecha_registro" class="form-label fw-bold">Fecha de Registro</label>
                            <input type="date" class="form-control" name="fecha_registro" id="fecha_registro"
                                   value="{{$cliente->fecha_registro}}" readonly>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="estado" class="form-label fw-bold">Estado</label>
                            <select class="form-select" name="estado" id="estado">
                                <option value="activo" {{$cliente->estado == 'activo' ? 'selected' : ''}}>Activo</option>
                                <option value="inactivo" {{$cliente->estado == 'inactivo' ? 'selected' : ''}}>Inactivo</option>
                            </select>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{route('clientes.index')}}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left me-2"></i>Cancelar
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-2"></i>Guardar Cambios
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
