<?php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\LibroController;
//Ruta para que el directorio raiz mande a login
Route::get('/', function () {
    return redirect()->route('login');
});

//Ruta para mostrar el formde inicio de sesion
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');

// Ruta para procesar el form de inicio de sesion
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

//Ruta para mostrar el formulario de usuarios
Route::get('/usuarios', [UsuarioController::class, 'index'])->name('usuarios.index');
// Ruta para validar el registro antes de ser mandado
Route::get('/usuarios/create', [UsuarioController::class, 'create'])->name('usuarios.create');

//Ruta para guardar el registro
Route::post('/usuarios', [UsuarioController::class, 'guardar'])->name('usuarios.guardar');
//Ruta para actualizar usuario
Route::put('/usuarios/{id}', [UsuarioController::class, 'actualizar'])->name('usuarios.actualizar');
//Ruta para eliminar usuario
Route::delete('/usuarios/{id}', [UsuarioController::class, 'eliminar'])->name('usuarios.eliminar');
//Ruta para el mensaje de confirmar eliminacion
Route::get('/usuarios/{id}/confirmar_eliminacion', [UsuarioController::class, 'confirmarEliminacion']) ->name('usuarios.confirmarEliminacion');


Route::get('/libros', [LibroController::class, 'index'])->name('libros.index');
Route::post('/libros', [LibroController::class, 'guardar'])->name('libros.guardar'); // Cambiado a 'guardar'
Route::put('/libros/{id}', [LibroController::class, 'actualizar'])->name('libros.actualizar'); // Cambiado a 'actualizar'
Route::delete('/libros/{id}', [LibroController::class, 'eliminar'])->name('libros.eliminar'); // Cambiado a 'eliminar'


