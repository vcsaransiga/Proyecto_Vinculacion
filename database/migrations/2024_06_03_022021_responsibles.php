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
        Schema::create('responsibles', function (Blueprint $table) {
            $table->string('id_responsible')->primary();
            $table->string('card_id');
            $table->string('name');
            $table->string('last_name');
            $table->string('area');
            $table->string('role'); 
            $table->boolean('status'); //activo o inactivo
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('responsibles');
    }
};
