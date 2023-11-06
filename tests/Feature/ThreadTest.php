<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class ThreadTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    // Can create a thread if user is authenticated
    public function can_create_threads_if_authenticated_http(): void
    {
         // With an authenticated user
        $user = User::factory()->create();
        $this->actingAs($user);
        $uid= $user['id'];
        
        $threadData = [
            'thetitle' => 'Test Thread Feature Test',
            'thebody' => 'can_create_threads_if_authenticated',
            'user_id' => $uid,
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
        $threadData = [
            'thetitle' => 'Test Thread Feature Test',
            'thebody' => 'can_create_threads_if_authenticated',
         ];

        // When
        $response = $this->post('/store-thread', $threadData);
 
        // Then
        $response->assertRedirect('/login');
    }
}
