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
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->string('uuid', 60)->unique();
            $table->string('nome', 200);
            $table->string('endereco', 200);
            $table->string('numero', 20);
            $table->string('complemento', 20)->nullable();
            $table->string('bairro', 200);
            $table->string('cidade', 200);
            $table->string('uf', 2);
            $table->string('cep', 8);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clientes');
    }
};
