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
        // Posts are left in a thread
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('body', 2000);
            $table->timestamps();

            // add FK to Threads
            $table->foreignId('thread_id')->references('id')->on('threads');

            // add FK to Users
            // TODO: change to user_id and fix all references
            $table->foreignId('userid')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
