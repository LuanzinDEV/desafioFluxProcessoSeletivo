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
        Schema::create('shopping', function (Blueprint $table) {
            $table->id();
            $table->string('cnpj', 20);
            $table->string('nome', 100);
            $table->string('razao_social', 100);
            $table->string('endereco', 255);
            $table->string('fotos', 255);
            $table->string('senha', 50);

            $table->timestamps(); // Adiciona os campos created_at e updated_at
        });

        // Inserindo valores na tabela shopping SERÁ O VALOR PADRÃO DO SHOPPING AO INICAR O PROGRAMA
        DB::table('shopping')->insert([
            'cnpj' => '00000000000001',
            'nome' => 'Shopping Center',
            'razao_social' => 'Razão Social do Shopping',
            'endereco' => 'Endereço do Shopping',
            'fotos' => 'https://img.freepik.com/free-photo/indoor-hotel-view_1417-1566.jpg?t=st=1709844450~exp=1709848050~hmac=19ea4f2cbcf9b9a203b15a51a343730c2342fc6e361075bb9241af1861173811&w=1380',
            'senha' => 'senha_segura',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shopping');
    }
};
