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
            $(document).ready(function() {
                // 1. Verifica que $productos existe antes de usarlo
                @if(!isset($productos))
                console.error('Error: Variable $productos no definida');
                var productosDisponibles = [];
                @else
                var productosDisponibles = @json($productos);
                @endif

                // 2. Función mejorada para actualizar select
                function actualizarSelectProductos(selectElement) {
                    selectElement.empty().append('<option value="">Seleccionar producto...</option>');

                    if(productosDisponibles.length === 0) {
                        console.warn('No hay productos disponibles');
                        return;
                    }

                    productosDisponibles.forEach(producto => {
                        if(producto.stock > 0) {
                            const option = new Option(
                                `${producto.nombre} (Stock: ${producto.stock}, $${producto.precio.toFixed(2)})`,
                                producto.id_producto,
                                false,
                                false
                            );
                            option.dataset.precio = producto.precio;
                            option.dataset.stock = producto.stock;
                            selectElement.append(option);
                        }
                    });

                    if(selectElement.hasClass('select2')) {
                        selectElement.trigger('change.select2');
                    }
                }

                // 3. Mejora en la creación de filas
                function crearFilaProducto(index) {
                    return `
            <tr data-index="${index}">
                <td>
                    <select class="form-select select-producto" name="productos[${index}][id]" required>
                        <option value="">Seleccionar producto...</option>
                        ${productosDisponibles.map(p =>
                        p.stock > 0 ?
                            `<option value="${p.id_producto}"
                                     data-precio="${p.precio}"
                                     data-stock="${p.stock}">
                                ${p.nombre} (Stock: ${p.stock}, $${p.precio.toFixed(2)})
                            </option>` : ''
                    ).join('')}
                    </select>
                </td>
                <td>
                    <input type="number" class="form-control precio" step="0.01" readonly>
                </td>
                <td>
                    <input type="number" class="form-control cantidad"
                           name="productos[${index}][cantidad]"
                           min="1" value="1" required>
                    <small class="text-muted stock-disponible"></small>
                </td>
                <td>
                    <input type="number" class="form-control subtotal" step="0.01" readonly>
                </td>
                <td>
                    <button type="button" class="btn btn-danger btn-eliminar">
                        <i class="fas fa-trash-alt"></i>
                    </button>
                </td>
            </tr>`;
                }

                    $('#tabla-productos tbody').append(nuevaFila);
                    $('.select-producto').select2();
                });

                // Eventos dinámicos
                $(document)
                    .on('change', '.select-producto', function() {
                        const fila = $(this).closest('tr');
                        const precio = parseFloat($(this).find('option:selected').data('precio')) || 0;
                        const stock = parseInt($(this).find('option:selected').data('stock')) || 0;

                        fila.find('.precio').val(precio.toFixed(2));
                        fila.find('.cantidad').attr('max', stock);
                        fila.find('.stock-disponible').text(`Max: ${stock}`);

                        calcularSubtotal(fila);
                        calcularTotal();
                    })
                    .on('input', '.cantidad', function() {
                        calcularSubtotal($(this).closest('tr'));
                        calcularTotal();
                    })
                    .on('click', '.btn-eliminar', function() {
                        if($('#tabla-productos tbody tr').length > 1) {
                            $(this).closest('tr').remove();
                            calcularTotal();
                        }
                    });

                function calcularSubtotal(fila) {
                    const precio = parseFloat(fila.find('.precio').val()) || 0;
                    const cantidad = parseInt(fila.find('.cantidad').val()) || 0;
                    const subtotal = precio * cantidad;

                    fila.find('.subtotal').val(subtotal.toFixed(2));
                }

                function calcularTotal() {
                    let total = 0;
                    $('.subtotal').each(function() {
                        total += parseFloat($(this).val()) || 0;
                    });
                    $('.total').val(total.toFixed(2));
                }

                // Agregar primer producto al cargar
                $('#btn-agregar-producto').click();
            });
        </script>
    @endsection
@endsection
