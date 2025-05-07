@extends("layouts.app")
@section("content")
    <div class="container">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0"><i class="fas fa-user-plus me-2"></i>Nuevo Cliente</h4>
            </div>
            <div class="card-body">
                <form method="post" action="{{route('clientes.store')}}">
                    @csrf

                    <div class="row mb-4">
                        <div class="col-md-6 mb-3">
                            <label for="nombre" class="form-label fw-bold">Nombre</label>
                            <input type="text" class="form-control" name="nombre" id="nombre" required>
                            <div class="invalid-feedback">Por favor ingrese el nombre del cliente</div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="apellido" class="form-label fw-bold">Apellido</label>
                            <input type="text" class="form-control" name="apellido" id="apellido" required>
                            <div class="invalid-feedback">Por favor ingrese el apellido del cliente</div>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-6 mb-3">
                            <label for="email" class="form-label fw-bold">Email</label>
                            <input type="email" class="form-control" name="email" id="email" required>
                            <div class="invalid-feedback">Por favor ingrese un email válido</div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="telefono" class="form-label fw-bold">Teléfono</label>
                            <input type="tel" class="form-control" name="telefono" id="telefono">
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="direccion" class="form-label fw-bold">Dirección</label>
                        <input type="text" class="form-control" name="direccion" id="direccion">
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-6 mb-3">
                            <label for="tipo_documento" class="form-label fw-bold">Tipo de Documento</label>
                            <select class="form-select" name="tipo_documento" id="tipo_documento" required>
                                <option value="" selected disabled>Seleccione...</option>
                                <option value="DNI">DNI</option>
                                <option value="RUC">RUC</option>
                                <option value="Pasaporte">Pasaporte</option>
                                <option value="INE">INE</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="numero_documento" class="form-label fw-bold">Número de Documento</label>
                            <input type="text" class="form-control" name="numero_documento" id="numero_documento" required>
                            <div class="invalid-feedback">Por favor ingrese el número de documento</div>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-6 mb-3">
                            <label for="fecha_registro" class="form-label fw-bold">Fecha de Registro</label>
                            <input type="date" class="form-control" name="fecha_registro" id="fecha_registro"
                                   value="{{ date('Y-m-d') }}" readonly>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="estado" class="form-label fw-bold">Estado</label>
                            <select class="form-select" name="estado" id="estado">
                                <option value="1" selected>Activo</option>
                                <option value="0">Inactivo</option>
                            </select>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{route('clientes.index')}}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left me-2"></i>Cancelar
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-2"></i>Guardar Cliente
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @section('scripts')
        <script>
            // Validación de formulario
            (function() {
                'use strict'

                const forms = document.querySelectorAll('.needs-validation')

                Array.from(forms).forEach(form => {
                    form.addEventListener('submit', event => {
                        if (!form.checkValidity()) {
                            event.preventDefault()
                            event.stopPropagation()
                        }

                        form.classList.add('was-validated')
                    }, false)
                })
            })()
        </script>
    @endsection
@endsection
