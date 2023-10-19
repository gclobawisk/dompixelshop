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
        Schema::create('produtos', function (Blueprint $table) {
            $table->id();
            $table->string('produto', 255)->unique();
            $table->string('descricao', 255);
            $table->decimal('preco', 9, 2);
            $table->integer('estoque');
            $table->tinyInteger('status')->default(1)->comment('0=inativo, 1=ativo, 2=excluído');
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produtos');
    }
};
