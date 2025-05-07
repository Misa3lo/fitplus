@extends("layouts.app")

@section("content")
    <div class="container">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0"><i class="fas fa-edit me-2"></i>Editar Producto</h4>
            </div>
            <div class="card-body">
                <form method="post" action="{{ route('productos.update', $producto->id_producto) }}">
                    @csrf
                    @method("PUT")

                    <!-- Fila 1: Nombre y Código de Barras -->
                    <div class="row mb-4">
                        <div class="col-md-6 mb-3">
                            <label for="nombre" class="form-label fw-bold">Nombre</label>
                            <input type="text" class="form-control" name="nombre" id="nombre"
                                   value="{{ $producto->nombre }}" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="codigo_barras" class="form-label fw-bold">Código de Barras</label>
                            <input type="text" class="form-control" name="codigo_barras" id="codigo_barras"
                                   value="{{ $producto->codigo_barras }}">
                        </div>
                    </div>

                    <!-- Fila 2: Precio y Stock -->
                    <div class="row mb-4">
                        <div class="col-md-6 mb-3">
                            <label for="precio" class="form-label fw-bold">Precio ($)</label>
                            <input type="number" step="0.01" class="form-control" name="precio" id="precio"
                                   value="{{ $producto->precio }}" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="stock" class="form-label fw-bold">Stock</label>
                            <input type="number" class="form-control" name="stock" id="stock"
                                   value="{{ $producto->stock }}" required>
                        </div>
                    </div>

                    <!-- Descripción -->
                    <div class="mb-4">
                        <label for="descripcion" class="form-label fw-bold">Descripción</label>
                        <textarea class="form-control" name="descripcion" id="descripcion" rows="2">{{ $producto->descripcion }}</textarea>
                    </div>

                    <!-- Fila 3: Categoría y Estado -->
                    <div class="row mb-4">
                        <div class="col-md-6 mb-3">
                            <label for="categoria" class="form-label fw-bold">Categoría</label>
                            <select class="form-select" name="categoria" id="categoria">
                                <option value="Pastillas" {{ $producto->categoria == 'Pastillas' ? 'selected' : '' }}>Pastillas</option>
                                <option value="Jarabes" {{ $producto->categoria == 'Jarabes' ? 'selected' : '' }}>Jarabes</option>
                                <option value="Cremas" {{ $producto->categoria == 'Cremas' ? 'selected' : '' }}>Cremas</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="estado" class="form-label fw-bold">Estado</label>
                            <select class="form-select" name="estado" id="estado">
                                <option value="activo" {{ $producto->estado == 'activo' ? 'selected' : '' }}>Activo</option>
                                <option value="inactivo" {{ $producto->estado == 'inactivo' ? 'selected' : '' }}>Inactivo</option>
                            </select>
                        </div>
                    </div>

                    <!-- Botones -->
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('productos.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left me-2"></i>Cancelar
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-2"></i>Guardar Cambios
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
