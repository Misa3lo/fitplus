@extends("layouts.app")

@section("content")
    <div class="container">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0"><i class="fas fa-truck me-2"></i>Registrar Nuevo Proveedor</h4>
            </div>
            <div class="card-body">
                <form method="post" action="{{ route('proveedores.store') }}" class="needs-validation" novalidate>
                    @csrf

                    <!-- Fila 1: Datos Básicos -->
                    <div class="row mb-3">
                        <div class="col-md-6 mb-3">
                            <label for="nombre_empresa" class="form-label fw-bold">Nombre de la Empresa <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="nombre_empresa" id="nombre_empresa" required>
                            <div class="invalid-feedback">Por favor ingrese el nombre de la empresa</div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="contacto_nombre" class="form-label fw-bold">Persona de Contacto <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="contacto_nombre" id="contacto_nombre" required>
                            <div class="invalid-feedback">Por favor ingrese el nombre del contacto</div>
                        </div>
                    </div>

                    <!-- Fila 2: Contacto -->
                    <div class="row mb-3">
                        <div class="col-md-6 mb-3">
                            <label for="telefono" class="form-label fw-bold">Teléfono <span class="text-danger">*</span></label>
                            <input type="tel" class="form-control" name="telefono" id="telefono" required>
                            <div class="invalid-feedback">Por favor ingrese un teléfono válido</div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="email" class="form-label fw-bold">Correo Electrónico</label>
                            <input type="email" class="form-control" name="email" id="email">
                        </div>
                    </div>

                    <!-- Fila 3: Ubicación -->
                    <div class="row mb-3">
                        <div class="col-md-6 mb-3">
                            <label for="direccion" class="form-label fw-bold">Dirección</label>
                            <input type="text" class="form-control" name="direccion" id="direccion">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="ruc" class="form-label fw-bold">RUC</label>
                            <input type="text" class="form-control text-uppercase" name="ruc" id="ruc" placeholder="Ej: XAXX010101000">
                        </div>
                    </div>

                    <!-- Estado -->
                    <div class="mb-4">
                        <label for="estado" class="form-label fw-bold">Estado <span class="text-danger">*</span></label>
                        <select class="form-select" name="estado" id="estado" required>
                            <option value="" disabled selected>Seleccione...</option>
                            <option value="activo">Activo</option>
                            <option value="inactivo">Inactivo</option>
                        </select>
                        <div class="invalid-feedback">Por favor seleccione un estado</div>
                    </div>

                    <!-- Botones -->
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('proveedores.index') }}" class="btn btn-outline-secondary">
                            <i class="fas fa-times-circle me-2"></i> Cancelar
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-2"></i> Registrar Proveedor
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
