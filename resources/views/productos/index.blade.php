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
                        <i class="fas fa-boxes me-2"></i>Gestión de Productos
                    </h1>
                    <a href="{{ route('productos.create') }}" class="btn btn-success">
                        <i class="fas fa-plus-circle me-1"></i> Nuevo Producto
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
                                <i class="fas fa-list me-2"></i>Listado de Productos
                            </h5>
                            <div class="input-group" style="width: 300px;">
                                <input type="text" class="form-control" placeholder="Buscar producto...">
                                <button class="btn btn-light" type="button">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover align-middle mb-0">
                                <thead class="table-light">
                                <tr>
                                    <th width="50">#</th>
                                    <th>Producto</th>
                                    <th>Descripción</th>
                                    <th>Precio</th>
                                    <th>Stock</th>
                                    <th>Categoría</th>
                                    <th>Estado</th>
                                    <th width="150">Acciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($productos as $producto)
                                    <tr>
                                        <td class="fw-bold">{{ $producto->id_producto }}</td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="avatar bg-primary text-white rounded-circle me-3">
                                                    {{ substr($producto->nombre, 0, 1) }}
                                                </div>
                                                <div>
                                                    <h6 class="mb-0">{{ $producto->nombre }}</h6>
                                                    <small class="text-muted">{{ $producto->codigo_barras }}</small>
                                                </div>
                                            </div>
                                        </td>
                                        <td>{{ Str::limit($producto->descripcion, 30) }}</td>
                                        <td>${{ number_format($producto->precio, 2) }}</td>
                                        <td>{{ $producto->stock }}</td>
                                        <td>{{ $producto->categoria }}</td>
                                        <td>
                                            @if($producto->estado == "activo")
                                                <span class="badge bg-success">Activo</span>
                                            @else
                                                <span class="badge bg-danger">Inactivo</span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="d-flex gap-2">
                                                <a href="{{ route('productos.edit', $producto->id_producto) }}"
                                                   class="btn btn-sm btn-primary rounded-circle p-2"
                                                   data-bs-toggle="tooltip"
                                                   title="Editar">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </a>
                                                <form action="{{ route('productos.destroy', $producto->id_producto) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                            class="btn btn-sm btn-danger rounded-circle p-2"
                                                            data-bs-toggle="tooltip"
                                                            title="Eliminar"
                                                            onclick="return confirm('¿Eliminar este producto?')">
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
                                Mostrando {{ $productos->count() }} registros
                            </div>
                            <nav aria-label="Page navigation">
                                <ul class="pagination pagination-sm mb-0">
                                    <li class="page-item disabled">
                                        <a class="page-link" href="#" tabindex="-1">Anterior</a>
                                    </li>
                                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
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

    <style>
        .avatar {
            width: 36px;
            height: 36px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
        }
    </style>

    @section('scripts')
        <script>
            // Inicializar tooltips
            document.addEventListener('DOMContentLoaded', function() {
                var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
                var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                    return new bootstrap.Tooltip(tooltipTriggerEl);
                });
            });
        </script>
    @endsection
@endsection
