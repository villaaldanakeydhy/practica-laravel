
@extends('layouts.app')

@section('titulo', 'Lista de productos')

@section('contenido')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h1 class="h3 mb-1">Lista de productos</h1>
        <p class="text-muted mb-0">Administra los productos de tu tienda.</p>
    </div>
    <a href="{{ route('productos.create') }}" class="btn btn-primary">
        + Nuevo producto
    </a>
</div>

<form action="{{ route('productos.index') }}" method="GET" class="card card-body mb-4">
    <div class="row g-3">
        <div class="col-md-6">
            <label for="buscar" class="form-label">Buscar por nombre</label>
            <input
                type="text"
                name="buscar"
                id="buscar"
                class="form-control"
                value="{{ $buscar }}"
                placeholder="Ej. Laptop"
            >
        </div>

        <div class="col-md-4">
            <label for="categoria" class="form-label">Categoría</label>
            <select name="categoria" id="categoria" class="form-select">
                <option value="">Todas las categorías</option>
                @foreach ($categorias as $cat)
                    <option value="{{ $cat }}" @selected($categoria == $cat)>
                        {{ $cat }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="col-md-2 d-flex align-items-end gap-2">
            <button type="submit" class="btn btn-primary">Buscar</button>
            <a href="{{ route('productos.index') }}" class="btn btn-secondary">Limpiar</a>
        </div>
    </div>
</form>

<div class="card">
    <div class="table-responsive">
        <table class="table table-striped table-hover mb-0">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Categoría</th>
                    <th>Precio</th>
                    <th class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($productos as $producto)
                    <tr>
                        <td>{{ $producto['id'] }}</td>
                        <td>{{ $producto['nombre'] }}</td>
                        <td>{{ $producto['categoria'] }}</td>
                        <td>${{ number_format($producto['precio'], 2) }}</td>
                        <td class="text-center">
                            <a
                                href="{{ route('productos.edit', $producto['id']) }}"
                                class="btn btn-sm btn-warning"
                            >
                                Editar
                            </a>

<button
    type="button"
    class="btn btn-sm btn-danger"
    data-bs-toggle="modal"
    data-bs-target="#modalEliminar"
    data-id="{{ $producto['id'] }}"
    data-nombre="{{ $producto['nombre'] }}"
>
    Eliminar
</button>
                            
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center py-4">
                            No se encontraron productos.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<p class="text-muted mt-3">
    Total de productos mostrados: {{ $productos->count() }}
</p>
@endsection 
<div class="modal fade" id="modalEliminar" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <form id="formEliminar" method="POST" class="modal-content">
            @csrf
            @method('DELETE')

            <div class="modal-header">
                <h5 class="modal-title">Confirmar eliminación</h5>
                <button type="button" class="btn-close"
                    data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>

            <div class="modal-body">
                ¿Seguro que deseas eliminar el producto
                <strong id="nombreEliminar"></strong>?
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary"
                    data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-danger">Eliminar</button>
            </div>
        </form>
    </div>
</div>

<script>
    document.getElementById('modalEliminar').addEventListener('show.bs.modal', (e) => {
        const boton = e.relatedTarget;
        const id = boton.dataset.id;

        document.getElementById('nombreEliminar').textContent = boton.dataset.nombre;
        document.getElementById('formEliminar').action = `/productos/${id}`;
    });
</script>

