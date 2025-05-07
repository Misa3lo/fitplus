@extends("layouts.app")
@section("content")
    <div class="container-fluid py-4">
        <!-- Encabezado -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center">
                    <a href="{{ url('/dashboard') }}" class="btn btn-outline-primary">
                        <i class="fas fa-tachometer-alt me-1"></i> Dashboard
                    </a>
                    <h1 class="h2 text-primary fw-bold">
                        <i class="fas fa-receipt me-2"></i>Editar Detalle de Venta
                    </h1>
                    <a href="{{ route('detalle_ventas.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left me-1"></i> Volver
                    </a>
                </div>
                <hr class="border-primary opacity-50">
            </div>
        </div>

        <!-- Formulario -->
        <div class="row">
            <div class="col-12">
                <div class="card shadow-sm border-0">
                    <div class="card-header bg-primary text-white py-3">
                        <h5 class="mb-0">
                            <i class="fas fa-edit me-2"></i>Editar Información del Detalle
                        </h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('detalle_ventas.update', $detalle->id_detalle) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="row g-3">
                                <!-- ID Venta -->
                                <div class="col-md-6">
                                    <label for="id_venta" class="form-label">Venta</label>
                                    <select class="form-select @error('id_venta') is-invalid @enderror" id="id_venta" name="id_venta" required>
                                        @foreach($ventas as $venta)
                                            <option value="{{ $venta->id_venta }}"
                                                {{ $detalle->id_venta == $venta->id_venta ? 'selected' : '' }}>
                                                Venta #{{ $venta->id_venta }} - {{ $venta->fecha_venta }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('id_venta')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- ID Producto -->
                                <div class="col-md-6">
                                    <label for="id_producto" class="form-label">Producto</label>
                                    <select class="form-select @error('id_producto') is-invalid @enderror" id="id_producto" name="id_producto" required>
                                        @foreach($productos as $producto)
                                            <option value="{{ $producto->id_producto }}"
                                                    {{ $detalle->id_producto == $producto->id_producto ? 'selected' : '' }}
                                                    data-precio="{{ $producto->precio }}">
                                                {{ $producto->nombre }} - ${{ number_format($producto->precio, 2) }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('id_producto')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Cantidad -->
                                <div class="col-md-4">
                                    <label for="cantidad" class="form-label">Cantidad</label>
                                    <input type="number" class="form-control @error('cantidad') is-invalid @enderror"
                                           id="cantidad" name="cantidad" min="1" value="{{ old('cantidad', $detalle->cantidad) }}" required>
                                    @error('cantidad')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Precio Unitario -->
                                <div class="col-md-4">
                                    <label for="precio_unitario" class="form-label">Precio Unitario</label>
                                    <div class="input-group">
                                        <span class="input-group-text">$</span>
                                        <input type="number" step="0.01" class="form-control @error('precio_unitario') is-invalid @enderror"
                                               id="precio_unitario" name="precio_unitario" min="0"
                                               value="{{ old('precio_unitario', $detalle->precio_unitario) }}" required>
                                    </div>
                                    @error('precio_unitario')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Subtotal -->
                                <div class="col-md-4">
                                    <label for="subtotal" class="form-label">Subtotal</label>
                                    <div class="input-group">
                                        <span class="input-group-text">$</span>
                                        <input type="number" step="0.01" class="form-control @error('subtotal') is-invalid @enderror"
                                               id="subtotal" name="subtotal" min="0"
                                               value="{{ old('subtotal', $detalle->subtotal) }}" readonly>
                                    </div>
                                    @error('subtotal')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Botones -->
                                <div class="col-12 mt-4">
                                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                        <button type="reset" class="btn btn-secondary me-md-2">
                                            <i class="fas fa-undo me-1"></i> Restablecer
                                        </button>
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fas fa-save me-1"></i> Actualizar Detalle
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @section('scripts')
        <script>
            // Calcular subtotal automáticamente
            document.addEventListener('DOMContentLoaded', function() {
                const cantidad = document.getElementById('cantidad');
                const precioUnitario = document.getElementById('precio_unitario');
                const subtotal = document.getElementById('subtotal');
                const selectProducto = document.getElementById('id_producto');

                function calcularSubtotal() {
                    const cant = parseFloat(cantidad.value) || 0;
                    const precio = parseFloat(precioUnitario.value) || 0;
                    subtotal.value = (cant * precio).toFixed(2);
                }

                cantidad.addEventListener('input', calcularSubtotal);
                precioUnitario.addEventListener('input', calcularSubtotal);

                // Actualizar precio unitario al cambiar producto
                selectProducto.addEventListener('change', function() {
                    const selectedOption = this.options[this.selectedIndex];
                    const precio = selectedOption.getAttribute('data-precio');
                    if (precio) {
                        precioUnitario.value = precio;
                        calcularSubtotal();
                    }
                });

                // Calcular subtotal inicial
                calcularSubtotal();
            });
        </script>
    @endsection
@endsection
