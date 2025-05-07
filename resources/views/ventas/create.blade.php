@extends("layouts.app")

@section("content")
    <div class="container">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0"><i class="fas fa-cash-register me-2"></i>Registrar Nueva Venta</h4>
            </div>
            <div class="card-body">
                <form method="post" action="{{ route('ventas.store') }}" id="form-venta">
                    @csrf

                    <!-- Fila 1: Fecha y Cliente -->
                    <div class="row mb-4">
                        <div class="col-md-6 mb-3">
                            <label for="fecha_venta" class="form-label fw-bold">Fecha de Venta <span class="text-danger">*</span></label>
                            <input type="date" class="form-control" name="fecha_venta" id="fecha_venta"
                                   value="{{ date('Y-m-d') }}" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="cliente_id" class="form-label fw-bold">Cliente</label>
                            <select class="form-select select2" name="cliente_id" id="cliente_id">
                                <option value="">Seleccionar cliente...</option>
                                @foreach($clientes as $cliente)
                                    <option value="{{ $cliente->id_cliente }}">{{ $cliente->nombre }} {{ $cliente->apellido }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <!-- Detalles de Venta -->
                    <div class="mb-4 border rounded p-3">
                        <h5 class="fw-bold mb-3"><i class="fas fa-boxes me-2"></i>Productos</h5>

                        <div class="table-responsive">
                            <table class="table" id="tabla-productos">
                                <thead>
                                <tr>
                                    <th width="45%">Producto</th>
                                    <th width="15%">Precio</th>
                                    <th width="15%">Cantidad</th>
                                    <th width="15%">Subtotal</th>
                                    <th width="10%"></th>
                                </tr>
                                </thead>
                                <tbody>
                                <!-- Fila de producto base (oculta) -->
                                <tr id="producto-base" class="d-none">
                                    <td>
                                        <select class="form-select select-producto" name="productos[0][id]">
                                            <option value="">Seleccionar producto...</option>
                                            @foreach($productos as $producto)
                                                <option value="{{ $producto->id_producto }}"
                                                        data-precio="{{ $producto->precio }}">
                                                    {{ $producto->nombre }} (Stock: {{ $producto->stock }})
                                                </option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <input type="number" class="form-control precio" step="0.01" readonly>
                                    </td>
                                    <td>
                                        <input type="number" class="form-control cantidad" name="productos[0][cantidad]" min="1" value="1">
                                    </td>
                                    <td>
                                        <input type="number" class="form-control subtotal" step="0.01" readonly>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-danger btn-eliminar">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </td>
                                </tr>
                                <!-- Filas dinámicas se agregarán aquí -->
                                </tbody>
                                <tfoot>
                                <tr>
                                    <td colspan="3" class="text-end fw-bold">Total:</td>
                                    <td colspan="2">
                                        <input type="number" class="form-control total" name="total" step="0.01" readonly>
                                    </td>
                                </tr>
                                </tfoot>
                            </table>
                        </div>

                        <button type="button" class="btn btn-sm btn-primary" id="btn-agregar-producto">
                            <i class="fas fa-plus-circle me-1"></i> Agregar Producto
                        </button>
                    </div>

                    <!-- Estado -->
                    <div class="mb-4">
                        <label for="estado" class="form-label fw-bold">Estado <span class="text-danger">*</span></label>
                        <select class="form-select" name="estado" id="estado" required>
                            <option value="pendiente" selected>Pendiente</option>
                            <option value="completada">Completada</option>
                            <option value="cancelada">Cancelada</option>
                        </select>
                    </div>

                    <!-- Botones -->
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('ventas.index') }}" class="btn btn-outline-secondary">
                            <i class="fas fa-times-circle me-2"></i> Cancelar
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-2"></i> Registrar Venta
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @section('scripts')
        <script>
            $(document).ready(function() {
                // Contador para índices de productos
                let contadorProductos = 0;

                // Agregar nuevo producto
                $('#btn-agregar-producto').click(function() {
                    contadorProductos++;
                    const nuevaFila = $('#producto-base').clone()
                        .removeClass('d-none')
                        .removeAttr('id')
                        .html(function(i, html) {
                            return html.replace(/\[0\]/g, `[${contadorProductos}]`);
                        });
                    $('#tabla-productos tbody').append(nuevaFila);
                    $('.select2').select2(); // Reinicializar Select2
                });

                // Calcular subtotal y total
                $(document).on('change', '.select-producto, .cantidad', function() {
                    const fila = $(this).closest('tr');
                    const precio = parseFloat(fila.find('.select-producto option:selected').data('precio')) || 0;
                    const cantidad = parseInt(fila.find('.cantidad').val()) || 0;
                    const subtotal = precio * cantidad;

                    fila.find('.precio').val(precio.toFixed(2));
                    fila.find('.subtotal').val(subtotal.toFixed(2));
                    calcularTotal();
                });

                // Eliminar producto
                $(document).on('click', '.btn-eliminar', function() {
                    if($('#tabla-productos tbody tr').not('#producto-base').length > 1) {
                        $(this).closest('tr').remove();
                        calcularTotal();
                    } else {
                        alert('Debe haber al menos un producto');
                    }
                });

                // Calcular total general
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
