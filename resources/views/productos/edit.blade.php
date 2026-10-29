
@extends('layouts.app')

@section('titulo', 'Editar producto')

@section('contenido')
<div class="row justify-content-center">
    <div class="col-md-8 col-lg-7">
        <div class="card shadow-sm">
            <div class="card-header bg-warning">
                <h1 class="h5 mb-0">Editar producto #{{ $producto['id'] }}</h1>
            </div>

            <div class="card-body">
                <form action="{{ route('productos.update', $producto['id']) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre del producto</label>
                        <input
                            type="text"
                            name="nombre"
                            id="nombre"
                            class="form-control @error('nombre') is-invalid @enderror"
                            value="{{ old('nombre', $producto['nombre']) }}"
                            required
                            minlength="3"
                            maxlength="100"
                        >
                        @error('nombre')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="categoria" class="form-label">Categoría</label>
                        <select
                            name="categoria"
                            id="categoria"
                            class="form-select @error('categoria') is-invalid @enderror"
                            required
                        >
                            @foreach (['Tecnología', 'Muebles', 'Papelería', 'Accesorios'] as $cat)
                                <option value="{{ $cat }}"
                                    @selected(old('categoria', $producto['categoria']) == $cat)>
                                    {{ $cat }}
                                </option>
                            @endforeach

                            @if (!in_array($producto['categoria'], ['Tecnología', 'Muebles', 'Papelería', 'Accesorios']))
                                <option value="{{ $producto['categoria'] }}" selected>
                                    {{ $producto['categoria'] }}
                                </option>
                            @endif
                        </select>
                        @error('categoria')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="precio" class="form-label">Precio ($)</label>
                        <input
                            type="number"
                            name="precio"
                            id="precio"
                            class="form-control @error('precio') is-invalid @enderror"
                            value="{{ old('precio', $producto['precio']) }}"
                            required
                            min="0"
                            step="0.01"
                        >
                        @error('precio')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('productos.index') }}" class="btn btn-secondary">
                            Cancelar
                        </a>
                        <button type="submit" class="btn btn-warning">
                            Actualizar producto
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
