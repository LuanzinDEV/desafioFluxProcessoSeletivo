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
        Schema::create('loja', function (Blueprint $table) {
            $table->id();
            $table->string('cnpj', 20)->unique();
            $table->string('nome', 100);
            $table->string('razao_social', 100);
            $table->string('responsavel', 100);
            $table->string('telefone', 50);
            $table->string('informacao', 255); 
            $table->string('foto', 255);
            $table->unsignedBigInteger('classificacao_id');

            $table->foreign('classificacao_id')->references('id')->on('classificacoes'); // Defini a chave estrangeira referenciando a tabela 'classificacoes'

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loja');
    }
};
