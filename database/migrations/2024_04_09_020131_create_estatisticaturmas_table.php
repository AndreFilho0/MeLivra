<?php

use App\Models\User;
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
        Schema::create('estatisticaturmas', function (Blueprint $table) {
            $table->id();
            $table->string('nomeProfessor',200);
            $table->string('instProfessor',200);
            $table->string('forGivinThis',200);
            $table->string('semestre',200);
            $table->boolean('base64_image')->nullable(0);
            $table->foreignIdFor(User::class,'criadoBY');
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estatisticaturmas');
    }
};
