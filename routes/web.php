<?php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\LibroController;
use App\Http\Controllers\TramiteController;
use App\Http\Controllers\BeneficiarioController;
use App\Http\Controllers\TopController;

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
Route::post('/libros', [LibroController::class, 'guardar'])->name('libros.guardar'); 
Route::put('/libros/{id}', [LibroController::class, 'actualizar'])->name('libros.actualizar'); 
Route::delete('/libros/{id}', [LibroController::class, 'eliminar'])->name('libros.eliminar'); 




Route::get('/tramites', [TramiteController::class, 'index'])->name('tramites.index');
Route::post('/tramites', [TramiteController::class, 'guardar'])->name('tramites.guardar');
Route::put('/tramites/{id}', [TramiteController::class, 'actualizar'])->name('tramites.actualizar');
Route::delete('/tramites/{id}', [TramiteController::class, 'eliminar'])->name('tramites.eliminar');


Route::get('/beneficiarios', [BeneficiarioController::class, 'index'])->name('beneficiarios.index');
Route::post('/beneficiarios', [BeneficiarioController::class, 'crear'])->name('beneficiarios.crear');
Route::put('/beneficiarios/{id}', [BeneficiarioController::class, 'actualizar'])->name('beneficiarios.actualizar');
Route::delete('/beneficiarios/{id}', [BeneficiarioController::class, 'eliminar'])->name('beneficiarios.eliminar');



//Route::get('/usuarios', [BeneficiarioController::class, 'index']);



Route::get('/top', [TopController::class, 'showTop']);


