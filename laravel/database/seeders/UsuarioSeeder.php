<?php

namespace Database\Seeders;

use App\Models\Empresa;
use App\Models\Usuario;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Usuario::factory()->count(10)->create();
    }
}
