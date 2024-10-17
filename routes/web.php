<?php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UsuarioController;

// Redirigir el directorio raíz ('/') al login
Route::get('/', function () {
    return redirect()->route('login');
});

// Ruta para mostrar el formulario de inicio de sesión (GET)
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');

// Ruta para procesar el formulario de inicio de sesión (POST)
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

// Ruta para mostrar el formulario de usuarios
Route::get('/usuarios', [UsuarioController::class, 'index'])->name('usuarios.index');
// Ruta para validar el registro antes de ser mandado
Route::get('/usuarios/create', [UsuarioController::class, 'create'])->name('usuarios.create');

// Ruta para guardar el registro
Route::post('/usuarios', [UsuarioController::class, 'guardar'])->name('usuarios.guardar');
