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
        Schema::create('exit_request_students', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('exit_request_id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('exit_request_id')->references('id')->on('exit_requests');
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exit_request_students');
    }
};
