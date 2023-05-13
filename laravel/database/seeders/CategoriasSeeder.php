<?php

namespace Database\Seeders;

use App\Models\Categorias;
use App\Models\Empresa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Categorias::factory()->count(5)->create();
    }
}
