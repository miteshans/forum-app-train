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
            'likeable_type' => 'App\Models\Thread',
            'user_id' => '1',
        ]);

        \App\Models\Like::factory()->create([
            'likeable_id' => '1',
            'likeable_type' => 'App\Models\Thread',
            'user_id' => '2',
        ]);
        

        // Seed some post likes
        \App\Models\Like::factory()->create([
            'likeable_id' => '1',
            'likeable_type' => 'App\Models\Post',
            'user_id' => '1',
        ]);
    }
}
