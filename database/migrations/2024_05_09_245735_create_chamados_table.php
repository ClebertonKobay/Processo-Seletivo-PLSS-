<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('chamados', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('titulo');
            $table->string('descricao');
            $table->date('prazo_solucao');
            $table->date('data_solucao')->nullable();
            $table->unsignedBigInteger('categoria_id');
            $table->unsignedBigInteger('situacao_id');

            $table->foreign('categoria_id')->on('categorias')->references('id');
            $table->foreign('situacao_id')->on('situacaos')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chamados');
    }
};
