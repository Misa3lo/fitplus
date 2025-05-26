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
                        <i class="fas fa-receipt me-2"></i>Detalle de Ventas
                    </h1>

                </div>
                <hr class="border-primary opacity-50">
            </div>
        </div>

        <!-- Tarjeta de Listado -->
        <div class="row">
            <div class="col-12">
                <div class="card shadow-sm border-0">
                    <div class="card-header bg-primary text-white py-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">
                                <i class="fas fa-list me-2"></i>Listado de Detalles de Venta
                            </h5>
                            <div class="input-group" style="width: 300px;">
                                <input type="text" class="form-control" placeholder="Buscar detalle...">
                                <button class="btn btn-light" type="button">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        @if($detalles->isEmpty())
                            <div class="alert alert-info m-4">No hay registros de detalle de ventas.</div>
                        @else
                            <div class="table-responsive">
                                <table class="table table-hover align-middle mb-0">
                                    <thead class="table-light">
                                    <tr>
                                        <th width="50">#</th>
                                        <th>ID Venta</th>
                                        <th>Producto</th>
                                        <th>Cantidad</th>
                                        <th>Precio Unitario</th>
                                        <th>Subtotal</th>
                                        <th width="150">Acciones</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($detalles as $detalle)
                                        <tr>
                                            <td class="fw-bold">{{ $loop->index+1 }}</td>
                                            <td>{{ $detalle->id_venta }}</td>
                                            <td>{{ $detalle->producto->nombre }}</td>
                                            <td>{{ $detalle->cantidad }}</td>
                                            <td>${{ number_format($detalle->precio_unitario, 2) }}</td>
                                            <td>${{ number_format($detalle->subtotal, 2) }}</td>
                                            <td>
                                                <div class="d-flex gap-2">
                                                    <a href="{{ route('detalle_ventas.edit', $detalle->id_detalle) }}"
                                                       class="btn btn-sm btn-primary rounded-circle p-2"
                                                       data-bs-toggle="tooltip"
                                                       title="Editar">
                                                        <i class="fas fa-pencil-alt"></i>
                                                    </a>

                                                    <form action="{{ route('detalle_ventas.destroy', $detalle->id_detalle) }}" method="POST" class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                                class="btn btn-sm btn-danger rounded-circle p-2"
                                                                data-bs-toggle="tooltip"
                                                                title="Eliminar"
                                                                onclick="return confirm('¿Estás seguro de eliminar este detalle?')">
                                                            <i class="fas fa-trash-alt"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif
                    </div>
                    <div class="card-footer bg-light">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="text-muted small">
                                Mostrando {{ $detalles->count() }} registros
                            </div>
                            <nav aria-label="Page navigation">
                                <ul class="pagination pagination-sm mb-0">
                                    <li class="page-item disabled">
                                        <a class="page-link" href="#" tabindex="-1">Anterior</a>
                                    </li>
                                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">Siguiente</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @section('scripts')
        <script>
            // Inicializar tooltips
            document.addEventListener('DOMContentLoaded', function() {
                var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
                var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                    return new bootstrap.Tooltip(tooltipTriggerEl)
                });
            });
        </script>
    @endsection
@endsection
