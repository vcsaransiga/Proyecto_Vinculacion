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
        Schema::create('mod_periods', function (Blueprint $table) {
            $table->integer('id_period');
            $table->string('id_mod');
            $table->primary(['id_period', 'id_mod']);
            $table->timestamps();

            // Índices adicionales
            $table->index('id_mod');
            $table->index('id_period');

            // Relaciones
            $table->foreign('id_mod')->references('id_mod')->on('modules')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_period')->references('id_period')->on('periods')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mod_periods');
    }
};
