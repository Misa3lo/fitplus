@extends("layouts.app")

@section("content")
    <div class="container">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">
                    <i class="fas fa-receipt me-2"></i>
                    Detalle de Venta #V-{{ str_pad($venta->id_venta, 4, '0', STR_PAD_LEFT) }}
                </h4>
            </div>
            <div class="card-body">
                <!-- Información general -->
                <div class="row mb-4">
                    <div class="col-md-6">
                        <h5 class="fw-bold">Información de la Venta</h5>
                        <p><strong>Fecha:</strong> {{ $venta->fecha_venta->format('d/m/Y') }}</p>
                        <p><strong>Estado:</strong>
                            @if($venta->estado == 'completada')
                                <span class="badge bg-success">Completada</span>
                            @elseif($venta->estado == 'pendiente')
                                <span class="badge bg-warning text-dark">Pendiente</span>
                            @else
                                <span class="badge bg-danger">Cancelada</span>
                            @endif
                        </p>
                    </div>
                    <div class="col-md-6">
                        <h5 class="fw-bold">Cliente</h5>
                        @if($venta->cliente)
                            <p>{{ $venta->cliente->nombre }} {{ $venta->cliente->apellido }}</p>
                            <p>{{ $venta->cliente->email }}</p>
                            <p>{{ $venta->cliente->telefono }}</p>
                        @else
                            <p class="text-muted">Sin cliente asignado</p>
                        @endif
                    </div>
                </div>

                <!-- Detalle de productos -->
                <h5 class="fw-bold mb-3"><i class="fas fa-boxes me-2"></i>Productos</h5>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="table-light">
                        <tr>
                            <th>Producto</th>
                            <th class="text-end">Precio Unitario</th>
                            <th class="text-end">Cantidad</th>
                            <th class="text-end">Subtotal</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($venta->productos as $producto)
                            <tr>
                                <td>{{ $producto->nombre }}</td>
                                <td class="text-end">${{ number_format($producto->pivot->precio_unitario, 2) }}</td>
                                <td class="text-end">{{ $producto->pivot->cantidad }}</td>
                                <td class="text-end">${{ number_format($producto->pivot->subtotal, 2) }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <td colspan="3" class="text-end fw-bold">Total:</td>
                            <td class="text-end fw-bold">${{ number_format($venta->total, 2) }}</td>
                        </tr>
                        </tfoot>
                    </table>
                </div>

                <div class="d-flex justify-content-end mt-4">
                    <a href="{{ route('ventas.index') }}" class="btn btn-secondary me-2">
                        <i class="fas fa-arrow-left me-2"></i> Volver
                    </a>
                    <a href="{{ route('ventas.edit', $venta->id_venta) }}" class="btn btn-primary me-2">
                        <i class="fas fa-edit me-2"></i> Editar
                    </a>
                    <form action="{{ route('ventas.destroy', $venta->id_venta) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"
                                onclick="return confirm('¿Está seguro de eliminar esta venta?')">
                            <i class="fas fa-trash-alt me-2"></i> Eliminar
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
