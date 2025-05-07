@extends("layouts.app")

@section("content")
    <div class="container">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0"><i class="fas fa-edit me-2"></i>Editar Venta #V-{{ str_pad($venta->id_venta, 4, '0', STR_PAD_LEFT) }}</h4>
            </div>
            <div class="card-body">
                <form method="post" action="{{ route('ventas.update', $venta->id_venta) }}">
                    @csrf
                    @method('PUT')

                    <!-- Fila 1: Fecha (solo lectura) y Total -->
                    <div class="row mb-4">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Fecha</label>
                            <input type="text" class="form-control-plaintext"
                                   value="{{ \Carbon\Carbon::parse($venta->fecha_venta)->format('d/m/Y') }}" readonly>
                            <input type="hidden" name="fecha_venta" value="{{ $venta->fecha_venta }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="total" class="form-label fw-bold">Total <span class="text-danger">*</span></label>
                            <input type="number" class="form-control" name="total" id="total" step="0.01"
                                   value="{{ old('total', $venta->total) }}" required>
                        </div>
                    </div>

                    <!-- Cliente (muestra ID) -->
                    <div class="mb-4">
                        <label class="form-label fw-bold">ID Cliente</label>
                        @if($venta->id_cliente)
                            <input type="text" class="form-control-plaintext"
                                   value="{{ $venta->id_cliente }}" readonly>
                            <input type="hidden" name="cliente_id" value="{{ $venta->id_cliente }}">
                        @else
                            <span class="form-control-plaintext text-muted">Sin cliente asignado</span>
                            <input type="hidden" name="cliente_id" value="">
                        @endif
                    </div>

                    <!-- Estado -->
                    <div class="mb-4">
                        <label for="estado" class="form-label fw-bold">Estado <span class="text-danger">*</span></label>
                        <select class="form-select" name="estado" id="estado" required>
                            <option value="pendiente" {{ $venta->estado == 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                            <option value="completada" {{ $venta->estado == 'completada' ? 'selected' : '' }}>Completada</option>
                            <option value="cancelada" {{ $venta->estado == 'cancelada' ? 'selected' : '' }}>Cancelada</option>
                        </select>
                    </div>

                    <!-- Botones -->
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('ventas.index') }}" class="btn btn-outline-secondary">
                            <i class="fas fa-times-circle me-2"></i> Cancelar
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-2"></i> Guardar Cambios
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
