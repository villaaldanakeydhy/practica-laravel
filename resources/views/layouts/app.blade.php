
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('titulo', 'Gestión de productos')</title>
<link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body class="bg-light">

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
           <a class="navbar-brand" href="{{ route('productos.index') }}">
                <i class="bi bi-box-seam"></i> Mi tienda
            </a>           
 <a class="btn btn-outline-light" href="{{ route('productos.create') }}">
                Agregar producto
            </a>
        </div>
    </nav>

    <main class="container py-4">
        @if (session('ok'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('ok') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"
                    aria-label="Cerrar"></button>
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Por favor, revisa los siguientes errores:</strong>
                <ul class="mb-0 mt-2">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @yield('contenido')
    </main>

</body>
</html>
