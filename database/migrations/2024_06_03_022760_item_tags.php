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
        Schema::create('item_tags', function (Blueprint $table) {
            $table->integer('id_tag');
            $table->string('id_item');
            $table->primary(['id_tag', 'id_item']);
            $table->timestamps();

            // Índices adicionales
            $table->index('id_item');
            $table->index('id_tag');

            // Relaciones
            $table->foreign('id_item')->references('id_item')->on('items')->onDelete('restrict')->onUpdate('restrict');
            $table->foreign('id_tag')->references('id_tag')->on('tags')->onDelete('restrict')->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('item_tags');
    }
};
