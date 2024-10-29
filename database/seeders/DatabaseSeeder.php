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
    }

    private function seedUsuarios()
    {
        DB::table('usuarios')->insert([
            [
                'id_usuario' => '286847',
                'nombre' => 'Carlos',
                'contrasena' => Hash::make('admin'),
                'rol' => 1
            ],
            // [
            //     'nombre' => 'Esmeralda',
            //     'contrasena' => Hash::make('123456'),
            //     'rol' => 2
            // ],
            // [
            //     'nombre' => 'Brayan',
            //     'contrasena' => Hash::make('123456'),
            //     'rol' => 2
            // ],
            // [
            //     'nombre' => 'Edgar',
            //     'contrasena' => Hash::make('123456'),
            //     'rol' => 2
            // ],
            // [
            //     'nombre' => 'Armando',
            //     'contrasena' => Hash::make('123456'),
            //     'rol' => 2
            // ]
        ]);
    }

    private function seedLibros()
    {
        DB::table('libros')->insert([
            ['nombre' => 'Cien Años de Soledad', 'estado' => 0],
            ['nombre' => 'El Principito', 'estado' => 0],
            ['nombre' => 'Don Quijote de la Mancha', 'estado' => 0],
            ['nombre' => 'La Odisea', 'estado' => 0],
            ['nombre' => 'Orgullo y Prejuicio', 'estado' => 0],
            ['nombre' => '1984', 'estado' => 0],
            ['nombre' => 'Moby Dick', 'estado' => 0],
            ['nombre' => 'La Metamorfosis', 'estado' => 0],
            ['nombre' => 'Crimen y Castigo', 'estado' => 0],
            ['nombre' => 'El Gran Gatsby', 'estado' => 0],
            ['nombre' => 'Fahrenheit 451', 'estado' => 0],
            ['nombre' => 'El Retrato de Dorian Gray', 'estado' => 0],
            ['nombre' => 'Jane Eyre', 'estado' => 0],
            ['nombre' => 'Ulises', 'estado' => 0],
            ['nombre' => 'Hamlet', 'estado' => 0],
            ['nombre' => 'La Iliada', 'estado' => 0],
            ['nombre' => 'Los Miserables', 'estado' => 0],
            ['nombre' => 'Anna Karenina', 'estado' => 0],
            ['nombre' => 'Cumbres Borrascosas', 'estado' => 0],
            ['nombre' => 'Divina Comedia', 'estado' => 0],
        ]);
    }
}
