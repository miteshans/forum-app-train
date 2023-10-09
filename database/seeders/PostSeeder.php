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
         // TODOD - NEEDS FK CONSTRAINT AT CODE LEVEL
         \App\Models\Post::factory()->create([
            'body' => 'post 1 body',
            'fk_thread_id' => 1,
        ]);

        //\App\Models\Post::factory(10)->create();
    }
}
