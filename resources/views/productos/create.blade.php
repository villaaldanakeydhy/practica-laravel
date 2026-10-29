
@extends('layouts.app')

@section('titulo', 'Agregar producto')

@section('contenido')
<div class="row justify-content-center">
    <div class="col-md-8 col-lg-7">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h1 class="h5 mb-0">Registrar nuevo producto</h1>
            </div>

            <div class="card-body">
                <form action="{{ route('productos.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre del producto</label>
                        <input
                            type="text"
                            name="nombre"
                            id="nombre"
                            class="form-control @error('nombre') is-invalid @enderror"
                            value="{{ old('nombre') }}"
                            required
                            minlength="3"
                            maxlength="100"
                            placeholder="Ej. Teclado"
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
                            <option value="">Selecciona una categoría</option>
                            <option value="Tecnología" @selected(old('categoria') == 'Tecnología')>Tecnología</option>
                            <option value="Muebles" @selected(old('categoria') == 'Muebles')>Muebles</option>
                            <option value="Papelería" @selected(old('categoria') == 'Papelería')>Papelería</option>
                            <option value="Accesorios" @selected(old('categoria') == 'Accesorios')>Accesorios</option>
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
                            value="{{ old('precio') }}"
                            required
                            min="0"
                            step="0.01"
                            placeholder="Ej. 599.99"
                        >
                        @error('precio')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('productos.index') }}" class="btn btn-secondary">
                            Cancelar
                        </a>
                        <button type="submit" class="btn btn-primary">
                            Guardar producto
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
