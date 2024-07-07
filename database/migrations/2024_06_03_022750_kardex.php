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
            $table->integer('id_ope');
            $table->string('id_ware');
            $table->string('id_pro');
            $table->string('name');
            $table->string('description');
            $table->date('date');
            $table->integer('quantity');
            $table->float('price');
            $table->integer('balance');
            $table->timestamps();

            // Índices adicionales
            $table->index('id_ope');
            $table->index('id_ware');
            $table->index('id_pro');

            // Relaciones
            $table->foreign('id_ope')->references('id_ope')->on('operations_type')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_ware')->references('id_ware')->on('warehouses')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_pro')->references('id_pro')->on('projects')->onDelete('cascade')->onUpdate('cascade');
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
