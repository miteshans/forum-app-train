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
        // Thread is the initial topic
        Schema::create('threads', function (Blueprint $table) {
            $table->id();
            $table->string('title', 100);
            $table->string('body', 2000);
            $table->timestamps();
            
            // add FK to Users
            $table->foreignId('userid')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('threads');
    }
};
