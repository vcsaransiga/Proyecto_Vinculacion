<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('kardex', function (Blueprint $table) {
            $table->string('id_kardex')->primary();
            $table->integer('id_ope')->nullable();
            $table->string('id_ware')->nullable();
            $table->string('name')->nullable();
            $table->string('description')->nullable();
            $table->date('date')->nullable();
            $table->integer('quantity')->nullable();
            $table->float('price')->nullable();
            $table->integer('balance')->nullable();
            $table->integer('doc_reference')->nullable();
            $table->string('operation_type')->nullable();
            $table->timestamps();

            // Índices adicionales
            $table->index('id_ope');
            $table->index('id_ware');

            // Relaciones
            $table->foreign('id_ope')->references('id_ope')->on('operations_type')->onDelete('restrict')->onUpdate('restrict');
            $table->foreign('id_ware')->references('id_ware')->on('warehouses')->onDelete('restrict')->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kardex');
    }
};
