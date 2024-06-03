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
        Schema::create('mod_tasks', function (Blueprint $table) {
            $table->string('id_task');
            $table->string('id_mod');
            $table->primary(['id_task', 'id_mod']);
            $table->timestamps();

            // Índices adicionales
            $table->index('id_mod');
            $table->index('id_task');

            // Relaciones
            $table->foreign('id_task')->references('id_task')->on('tasks')->onDelete('restrict')->onUpdate('restrict');
            $table->foreign('id_mod')->references('id_mod')->on('modules')->onDelete('restrict')->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mod_tasks');
    }
};
