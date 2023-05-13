<?php

namespace Database\Seeders;

use App\Models\Categorias;
use App\Models\Empresa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Seeder;

class EmpresaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Empresa::factory()->count(20)->create()->each(function ($empresa) {
            $categorias = Categorias::inRandomOrder()->limit(3)->get(); // selecionar até 3 categorias aleatórias
            // dd($empresa->categorias());
            $empresa->categorias()->attach($categorias); // associar as categorias à empresa
        });
    }
}
