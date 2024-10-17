<?php

namespace Database\Seeders;

use App\Models\Usuario; // Asegúrate de que este es el nombre correcto de tu modelo
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Crear usuarios predeterminados
        $this->crearUsuarios();
    }

    private function crearUsuarios()
    {
        // Crear usuario administrador
        Usuario::insert([
            'nombre' => 'Rolo', // Ajusta según el nombre del campo en tu base de datos
            'contrasena' => bcrypt('admin'), // Asegúrate de que el nombre del campo sea correcto
            'rol' => 1 // Asegúrate de que este valor sea el correcto para el rol de admin
        ]);

        // Crear usuario bibliotecario
        Usuario::insert([
            'nombre' => 'Esmeralda', // Ajusta según el nombre del campo en tu base de datos
            'contrasena' => bcrypt('1234'), // Asegúrate de que el nombre del campo sea correcto
            'rol' => 2 // Asegúrate de que este valor sea el correcto para el rol de bibliotecario
        ]);
    }
}
