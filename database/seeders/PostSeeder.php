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
         // seed some Threads 
        \App\Models\Post::factory()->create([
            'body' => 'post 1 on thread 1 by user 1',
            'fk_thread_id' => 1,
            'fk_user_id' => 1,
        ]);

        \App\Models\Post::factory()->create([
            'body' => 'post 2 on thread 1 by user 1',
            'fk_thread_id' => 1,
            'fk_user_id' => 1,
        ]);

        \App\Models\Post::factory()->create([
            'body' => 'post 3 on thread 2 by user 2',
            'fk_thread_id' => 2,
            'fk_user_id' => 2,
        ]);

        //\App\Models\Post::factory(10)->create();
    }
}
