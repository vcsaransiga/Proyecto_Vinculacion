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
        Schema::create('items', function (Blueprint $table) {
            $table->string('id_item')->primary();
            $table->string('id_catitem');
            $table->string('id_unit');
            $table->string('id_pro');
            $table->string('name');
            $table->string('description');
            $table->date('date');
            $table->bigInteger('stock');
            $table->timestamps();

            // Índices adicionales
            $table->index('id_pro');
            $table->index('id_catitem');
            $table->index('id_unit');

            // Relaciones
            $table->foreign('id_catitem')->references('id_catitem')->on('categories_items')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_pro')->references('id_pro')->on('projects')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_unit')->references('id_unit')->on('measurement_units')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
};
