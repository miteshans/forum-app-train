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
        // Likes are stored on Posts by users
        Schema::create('postlikes', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            // add FK to Threads
            $table->foreignId('post_id')->references('id')->on('threads');

            // add FK to Users
            $table->foreignId('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('postlikes');
    }
};