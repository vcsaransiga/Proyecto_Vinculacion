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
        Schema::create('warehouses', function (Blueprint $table) {
            $table->string('id_ware')->primary();
            $table->string('id_catware')->nullable();
            $table->string('name')->nullable();
            $table->string('description')->nullable();
            $table->timestamps();

            // Relaciones
            $table->foreign('id_catware')->references('id_catware')->on('categories_warehouse')->onDelete('restrict')->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('warehouses');
    }
};
