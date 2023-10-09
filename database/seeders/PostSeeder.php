<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // seed some Posts
         \App\Models\Post::factory()->create([
            'body' => 'post 1 body',
            'fk_thread_id' => 1,
        ]);
    }
}
