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
        Schema::create('logs', function (Blueprint $table) {
            $table->integer('id_log')->primary();
            $table->integer('user_id');
            $table->date('event_date');
            $table->string('method_name');
            $table->string('event_description');
            $table->string('ip_address');
            $table->timestamps();

            // Índices adicionales
            $table->index('user_id');

            // Relaciones
            $table->foreign('user_id')->references('id')->on('users')->onDelete('restrict')->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('logs');
    }
};
