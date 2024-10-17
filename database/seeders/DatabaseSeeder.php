<?php

namespace Database\Seeders;

use App\Models\Usuario; 
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    
    public function run(): void
    {
        
        $this->crearUsuarios();
    }

    private function crearUsuarios()
    {
        
        Usuario::insert([
            'nombre' => 'Rolo', 
            'contrasena' => bcrypt('admin'), 
            'rol' => 1 
        ]);

        // Crear usuari bibliotecario
        Usuario::insert([
            'nombre' => 'Esmeralda', 
            'contrasena' => bcrypt('1234'), 
            'rol' => 2 
        ]);
    }
}
