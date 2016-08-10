# Curso de Laravel - Sábados (Framework Php) - Educomser SRL

> Curso de Laravel 5.2 para Educomser SRL.

## Documentación Oficial

Recuerda revisar la documentación para reforzar los conocimientos impartidos [Laravel website](http://laravel.com/docs).

## Trabajos de Investigación

Todos los trabajos deben ser enviados por correo electrónico en formato texto.

1. Realizar ejercicios puntuales para complementar las rutas (patch, delete y options) indicando su funcionalidad.
    - [Referencia](https://laravel.com/docs/5.2/routing)
2. Implementar CRUD para las tablas: categorias y tags.
3. Implementar la recuperación de posts eliminados.
    - [Referencia](https://laravel.com/docs/5.2/eloquent#soft-deleting)

## Notas Parciales

Código de Alumno | Asistencia | TI-01 | TI-02 | TI-03 | Examen Final
---------------- | :--------: | :---: | :---: | :---: | :----------:

## Comandos Artisan

Ejecutar el Servidor Artisan:
```javascript
php artisan serve
```
Crear un controlador:
```javascript
php artisan make:controller PruebaController
php artisan make:controller PruebaController --resource
```
Crear una migración:
```javascript
php artisan make:migration create_pruebas_table --create=pruebas
```
Crear un seeder
```javascript
php artisan make:seeder PruebasTableSeeder
```
Crear un modelo
```javascript
php artisan make:model Prueba
```
Crear un request
```javascript
php artisan make:request PruebaRequest
```
Ejecutar las migraciones y datos seeding
```javascript
php artisan migrate
php artisan migrate:refresh
php artisan migrate:refresh --seed
php artisan db:seed
```
## Facilitador

J. Marcelo Arze - Desarrollador de Sistemas
- [marze@educomser.com](marze@educomser.com)
- [arze.jesus@gmail.com](arze.jesus@gmail.com)