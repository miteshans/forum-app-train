<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class ThreadTest extends TestCase
{

    /** @test */
    // Can create a thread if user is authenticated
    public function can_create_threads_if_authenticated(): void
    {
        
         // With an authenticated user
        $user = User::factory()->create();
        $this->actingAs($user);
 
        $threadData = [
            'thetitle' => 'Test Thread',
            'thebody' => 'This is the thread body content.',
         ];
 
        // When
        $response = $this->post('/store-thread', $threadData);
 
        // Then
        $response->assertRedirect('/add-a-thread');
    }

    /** @test */
    // Cannot create a thread if user is NOT authenticated
    public function cannot_create_threads_if_not_authenticated(): void
    {
        // When
        $response = $this->post('/store-thread');
 
        // Then
        $response->assertRedirect('/login');
    }
}
