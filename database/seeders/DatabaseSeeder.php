<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->seedUsuarios();
        $this->seedLibros();
        $this->seedTops();
        $this->seedBeneficiarios();
    }

    private function seedUsuarios() 
{
    DB::table('usuarios')->insert([
        [
            'nombre' => 'Carlos',
            'contrasena' => Hash::make('admin'),
           // 'id_usuario' => '286847',
            'rol' => 1
        ],
        [
            'nombre' => 'Esmeralda',
            'contrasena' => Hash::make('123456'),
            'rol' => 2
        ],
        [
            'nombre' => 'Brayan',
            'contrasena' => Hash::make('123456'),
            'rol' => 2
        ],
        [
            'nombre' => 'Edgar',
            'contrasena' => Hash::make('123456'),
            'rol' => 2
        ],
        [
            'nombre' => 'Armando',
            'contrasena' => Hash::make('123456'),
            'rol' => 2
        ]
    ]);
}


    private function seedLibros()
    {
        DB::table('libros')->insert([
            ['nombre' => 'Cien Años de Soledad', 'estado' => 1],
            ['nombre' => 'El Principito', 'estado' => 1],
            ['nombre' => 'Don Quijote de la Mancha', 'estado' => 1],
            ['nombre' => 'La Odisea', 'estado' => 1],
            ['nombre' => 'Orgullo y Prejuicio', 'estado' => 1],
            ['nombre' => '1984', 'estado' => 1],
            ['nombre' => 'Moby Dick', 'estado' => 1],
            ['nombre' => 'La Metamorfosis', 'estado' => 1],
            ['nombre' => 'Crimen y Castigo', 'estado' => 1],
            ['nombre' => 'El Gran Gatsby', 'estado' => 1],
            ['nombre' => 'Fahrenheit 451', 'estado' => 1],
            ['nombre' => 'El Retrato de Dorian Gray', 'estado' => 1],
            ['nombre' => 'Jane Eyre', 'estado' => 1],
            ['nombre' => 'Ulises', 'estado' => 1],
            ['nombre' => 'Hamlet', 'estado' => 1],
            ['nombre' => 'La Iliada', 'estado' => 1],
            ['nombre' => 'Los Miserables', 'estado' => 1],
            ['nombre' => 'Anna Karenina', 'estado' => 1],
            ['nombre' => 'Cumbres Borrascosas', 'estado' => 1],
            ['nombre' => 'Divina Comedia', 'estado' => 1],
        ]);
    }
    private function seedTops()
    {
        DB::table('tops')->insert([
            ['titulo' => 'Cien Años de Soledad', 'contador' => 8],
            ['titulo' => 'El Principito', 'contador' => 8],
            ['titulo' => 'Don Quijote de la Mancha', 'contador' => 7],
            ['titulo' => 'La Odisea', 'contador' => 6],
            ['titulo' => 'Orgullo y Prejuicio', 'contador' => 5],
            ['titulo' => '1984', 'contador' => 4],
            ['titulo' => 'Moby Dick', 'contador' => 2],
            ['titulo' => 'El Gran Gatsby', 'contador' => 0],
        ]);
    }
    private function seedBeneficiarios()
    {
        DB::table('tops')->insert([
            ['titulo' => 'Cien Años de Soledad', 'contador' => 8],
            ['titulo' => 'El Principito', 'contador' => 8],
            ['titulo' => 'Don Quijote de la Mancha', 'contador' => 7],
            ['titulo' => 'La Odisea', 'contador' => 6],
            ['titulo' => 'Orgullo y Prejuicio', 'contador' => 5],
            ['titulo' => '1984', 'contador' => 4],
            ['titulo' => 'Moby Dick', 'contador' => 2],
            ['titulo' => 'El Gran Gatsby', 'contador' => 0],
        ]);
    }
}
