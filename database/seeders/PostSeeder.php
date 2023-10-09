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
            'body' => 'post 1 body user 1',
            'fk_user_id' => 1,
        ]);

        \App\Models\Post::factory()->create([
            'body' => 'post 2 body user 1',
            'fk_user_id' => 1,
        ]);

        \App\Models\Post::factory()->create([
            'body' => 'post 1 body',
            'fk_user_id' => 2,
        ]);

        //\App\Models\Post::factory(10)->create();
    }
}
