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
            'body' => 'thread 1 by user 1',
            'userid' => 1,
        ]);

        \App\Models\Thread::factory()->create([
            'title' => 'Thread 2 title',
            'body' => 'thread 2 by user 1',
            'userid' => 1,
        ]);

        \App\Models\Thread::factory()->create([
            'title' => 'Thread 3 title',
            'body' => 'thread 3 by user 2',
            'userid' => 2,
        ]);
    }
}
