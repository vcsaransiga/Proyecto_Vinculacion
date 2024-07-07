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
        Schema::create('tasks', function (Blueprint $table) {
            $table->string('id_task')->primary();
            $table->string('id_pro');
            $table->string('name');
            $table->string('description');
            $table->float('hours');
            $table->date('start_date');
            $table->date('end_date');
            $table->float('percentage');
            $table->enum('status', ['pending', 'completed'])->default('pending');
            $table->timestamps();

            // Relaciones
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
        Schema::dropIfExists('tasks');
    }
};
