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
        Schema::create('mod_projects', function (Blueprint $table) {
            $table->string('id_pro');
            $table->string('id_mod');
            $table->primary(['id_pro', 'id_mod']);
            $table->timestamps();

            // Índices adicionales
            $table->index('id_mod');
            $table->index('id_pro');

            // Relaciones
            $table->foreign('id_mod')->references('id_mod')->on('modules')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_pro')->references('id_pro')->on('projects')->onDelete('cascade')->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mod_projects');
    }
};
