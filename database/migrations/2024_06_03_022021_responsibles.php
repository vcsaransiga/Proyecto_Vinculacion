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
            $table->string('name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('area')->nullable();
            $table->string('role')->nullable();
            $table->boolean('status')->nullable();
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
