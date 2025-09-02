<?php

namespace Database\Seeders;

use App\Models\Cliente;
use GuzzleHttp\Client;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class clienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Cliente::firstOrCreate(
            [
                'Nombre' => 'nadia'
            ]
        );
         Cliente::firstOrCreate(
            [
                'Nombre' => 'ivonne'
            ]
        );
         Cliente::firstOrCreate(
            [
                'Nombre' => 'julia'
            ]
        );
    }
}
