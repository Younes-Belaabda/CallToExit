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
        Schema::create('student_father', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('father_id');
            $table->unsignedBigInteger('student_id');
            $table->foreign('father_id')->references('id')->on('users');
            $table->foreign('student_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_father');
    }
};
