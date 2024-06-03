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
        Schema::create('projects', function (Blueprint $table) {
            $table->string('id_pro')->primary();
            $table->string('id_responsible')->nullable();
            $table->string('name')->nullable();
            $table->string('description')->nullable();
            $table->string('status')->nullable();
            $table->float('progress')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->float('budget')->nullable();
            $table->timestamps();

            // Índices adicionales
            $table->index('id_responsible');

            // Relaciones
            $table->foreign('id_responsible')->references('id_responsible')->on('responsibles')->onDelete('restrict')->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects');
    }
};
