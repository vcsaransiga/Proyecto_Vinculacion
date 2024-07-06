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
        Schema::create('modules', function (Blueprint $table) {
            $table->string('id_mod')->primary();
            $table->string('id_responsible');
            $table->bigInteger('id_period');
            $table->string('name');
            $table->date('start_date');
            $table->date('end_date');
            $table->integer('vinculation_hours');
            $table->boolean('status'); //activo o inactivo
            $table->timestamps();

            // Índices adicionales
            $table->index('id_responsible');
            $table->index('id_period');

            // Relaciones
            $table->foreign('id_responsible')->references('id_responsible')->on('responsibles')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('modules');
    }
};
