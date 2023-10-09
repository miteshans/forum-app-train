<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // \App\Models\User::factory(10)->create();

         \App\Models\User::factory()->create([
            'name' => 'Mits',
            'email' => 'mitesh.chohan@gmail.com',
            'password' => 'ans',
            'is_admin'=>true,
        ]);
    }
}
