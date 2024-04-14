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
        Schema::create('professors', function (Blueprint $table) {
            $table->id();
            $table->string('nomeProfessor',200);
            $table->string('instituto',100);
            $table->integer('Nota');
            $table->integer('QtsAvalicao');
            $table->integer('QtsN1');
            $table->integer('QtsN2');
            $table->integer('QtsN3');
            $table->integer('QtsN4');
            $table->integer('QtsN5');
            $table->integer('QtsN6');
            $table->integer('QtsN7');
            $table->integer('QtsN8');
            $table->integer('QtsN9');
            $table->integer('QtsN10');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('professors');
    }
};
