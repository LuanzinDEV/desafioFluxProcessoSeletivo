<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('classificacoes', function (Blueprint $table) {
            $table->id();
            $table->string('tipo', 100); 
            $table->timestamps();
        });

        DB::table('classificacoes')->insert([
            'tipo' => 'Roupas',
        ]);

        DB::table('classificacoes')->insert([
            'tipo' => 'Sapatos',
        ]);

        DB::table('classificacoes')->insert([
            'tipo' => 'Comidas',
        ]);

        DB::table('classificacoes')->insert([
            'tipo' => 'Restaurante',
        ]);

        DB::table('classificacoes')->insert([
            'tipo' => 'Eletronicos',
        ]);

        DB::table('classificacoes')->insert([
            'tipo' => 'Joias',
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('classificacoes');
    }
};
