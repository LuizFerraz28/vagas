<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('categorias_empresa', function (Blueprint $table) {
            $table->unsignedBigInteger('categorias_id');
            $table->unsignedBigInteger('empresa_id');
        
            $table->foreign('categorias_id')->references('id')->on('categorias');
            $table->foreign('empresa_id')->references('id')->on('empresas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categorias_empresa');
    }
};
