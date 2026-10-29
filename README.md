# Práctica: Peticiones HTTP en Laravel con Bootstrap 5
## Descripción
Este proyecto consiste en una aplicación web para administrar productos utilizando Laravel y Bootstrap 5, permite realizar operaciones de consulta, registro, edición y eliminación de productos
## Tecnologías utilizadas
- Laravel
- PHP
- Bootstrap 5
- JavaScript
- Vite
- Git y GitHub
## Funcionalidades
- **GET:** mostrar la lista de productos, buscar y filtrar por categoría
- **POST:** registrar nuevos productos
- **PUT:** editar productos existentes
- **DELETE:** eliminar productos mediante una ventana de confirmación
- Mostrar mensajes de éxito y errores de validación
- Diseño adaptable a distintos tamaños de pantalla

## Requisitos
- PHP
- Composer
- Node.js y npm

## Cómo ejecutar el proyecto
1. Clonar el repositorio o descargar el proyecto
2. Instalar las dependencias de PHP:

   `composer install`
3. Crear el archivo de configuración:
   `copy .env.example .env`
4. Generar la clave de la aplicación:
   `php artisan key:generate`
5. Instalar las dependencias de JavaScript:
   `npm install`
6. Compilar los recursos:
   `npm run build`
7. Iniciar el servidor de Laravel:
   `php artisan serve`
8. Abrir en el navegador:
   `http://127.0.0.1:8000`

## Almacenamiento de los productos
Los productos de esta práctica se administran mediante la sesión de Laravel. No es necesario configurar una base de datos para probar las funciones de la práctica


