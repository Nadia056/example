<?php

namespace Database\Seeders;

use App\Models\Almacen;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class almacenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         Almacen::firstOrCreate(
            [
                'nombre' => 'Norte'
            ]
        );
         Almacen::firstOrCreate(
            [
                'nombre' => 'Sur'
            ]
        );
         Almacen::firstOrCreate(
            [
                'nombre' => 'Este'
            ]
        );
         Almacen::firstOrCreate(
            [
                'nombre' => 'Oeste'
            ]
        );
    }
}
