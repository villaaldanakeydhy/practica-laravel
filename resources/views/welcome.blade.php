
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi proyecto Laravel</title>

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #DAE0F2;
            color: #26345c;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .contenedor {
            background: white;
            padding: 40px;
            border-radius: 18px;
            text-align: center;
            box-shadow: 0 5px 20px #00000015;
            max-width: 450px;
            margin: 20px;
        }

        h1 {
            color: #5268a5;
        }

        button {
            background: #5268a5;
            color: white;
            border: none;
            padding: 12px 22px;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background: #394d87;
        }
    </style>
</head>
<body>
    <div class="contenedor">
        <h1>¡Hola, Laravel 13!</h1>

        <p>Mi proyecto ya está funcionando correctamente.</p>

        <button onclick="mostrarMensaje()">
            Haz clic aquí
        </button>
    </div>

    <script>
        function mostrarMensaje() {
            alert("¡Felicidades! Tu primera interfaz en Laravel funciona.");
        }
    </script>
</body>
</html>
