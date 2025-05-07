@extends("layouts.app")

@section("content")
    <div class="container-fluid py-4">
        <!-- Encabezado -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center">
                    <h1 class="h2 text-primary fw-bold">
                        <i class="fas fa-cash-register me-2"></i>Registro de Ventas
                    </h1>
                    <a href="{{ route('ventas.create') }}" class="btn btn-success">
                        <i class="fas fa-plus-circle me-1"></i> Nueva Venta
                    </a>
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
                                <i class="fas fa-list me-2"></i>Historial de Ventas
                            </h5>
                            <div class="input-group" style="width: 300px;">
                                <input type="date" class="form-control" id="fecha-filtro">
                                <button class="btn btn-light" type="button" id="btn-filtrar">
                                    <i class="fas fa-filter"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover align-middle mb-0">
                                <thead class="table-light">
                                <tr>
                                    <th width="80">ID</th>
                                    <th>Fecha</th>
                                    <th>Total</th>
                                    <th>Cliente</th>
                                    <th>Estado</th>
                                    <th width="120">Acciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($ventas as $venta)
                                    <tr>
                                        <td class="fw-bold">V-{{ str_pad($venta->id_venta, 4, '0', STR_PAD_LEFT) }}</td>
                                        <td>{{ \Carbon\Carbon::parse($venta->fecha_venta)->format('d/m/Y') }}</td>
                                        <td>${{ number_format($venta->total, 2) }}</td>
                                        <td>
                                            @if($venta->cliente)
                                                {{ $venta->cliente->nombre }} {{ $venta->cliente->apellido }}
                                            @else
                                                <span class="text-muted">Sin cliente</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if($venta->estado == 'completada')
                                                <span class="badge bg-success">Completada</span>
                                            @elseif($venta->estado == 'pendiente')
                                                <span class="badge bg-warning text-dark">Pendiente</span>
                                            @else
                                                <span class="badge bg-secondary">{{ $venta->estado }}</span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="d-flex gap-2">
                                                <a href="{{ route('ventas.edit', $venta->id_venta) }}"
                                                   class="btn btn-sm btn-primary rounded-circle p-2"
                                                   data-bs-toggle="tooltip"
                                                   title="Editar">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </a>
                                                <form action="{{ route('ventas.destroy', $venta->id_venta) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                            class="btn btn-sm btn-danger rounded-circle p-2"
                                                            data-bs-toggle="tooltip"
                                                            title="Eliminar"
                                                            onclick="return confirm('¿Eliminar esta venta?')">
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
                    </div>
                    <div class="card-footer bg-light">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="text-muted small">
                                Mostrando {{ $ventas->count() }} de {{ $ventas->total() }} registros
                            </div>
                            {{ $ventas->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @section('scripts')
        <script>
            // Inicializar tooltips
            $(document).ready(function(){
                $('[data-bs-toggle="tooltip"]').tooltip();

                // Filtrar por fecha
                $('#btn-filtrar').click(function(){
                    const fecha = $('#fecha-filtro').val();
                    window.location.href = "{{ route('ventas.index') }}?fecha=" + fecha;
                });
            });
        </script>
    @endsection
@endsection
