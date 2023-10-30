<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ThreadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // seed some Threads 
        \App\Models\Thread::factory()->create([
            'title' => 'Thread 1 title',
            'body' => 'thread 1',
            'user_id' => 1,
        ]);

        \App\Models\Thread::factory()->create([
            'title' => 'Thread 2 title',
            'body' => 'thread 2',
            'user_id' => 2,
        ]);

        \App\Models\Thread::factory()->create([
            'title' => 'Thread 3 title',
            'body' => 'thread 3',
            'user_id' => 2,
        ]);
    }
}
