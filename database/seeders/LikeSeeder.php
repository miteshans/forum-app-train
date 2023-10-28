<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LikeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Seed some thread likes
        \App\Models\Like::factory()->create([
            'likeable_id' => '1',
            'likeable_type' => 'thread',
            'user_id' => '1',
        ]);

        \App\Models\Like::factory()->create([
            'likeable_id' => '1',
            'likeable_type' => 'post',
            'user_id' => '1',
        ]);

        // Seed some post likes
        // \App\Models\PostLike::factory()->create([
        //     'post_id' => '1',
        //     'user_id' => '1',
        // ]);        
    
        //\App\Models\Threadlike::factory(10)->create();
    }
}
