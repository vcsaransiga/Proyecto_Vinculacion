<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('taggables', function (Blueprint $table) {
            $table->dropColumn('taggable_id');
        });

        Schema::table('taggables', function (Blueprint $table) {
            $table->string('taggable_id'); // Cambiar a string para que acepte ID de tipo string
        });
    }

    public function down(): void
    {
        Schema::table('taggables', function (Blueprint $table) {
            $table->dropColumn('taggable_id');
        });

        Schema::table('taggables', function (Blueprint $table) {
            $table->foreignId('taggable_id');
        });
    }
};
