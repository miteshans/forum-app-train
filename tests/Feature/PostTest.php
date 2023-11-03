<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;


class PostTest extends TestCase
{
     /** @test */
    // User can create a post if authenticated via http
    public function can_create_post_if_authenticated_http(): void
    {
         // With an authenticated user
        $user = User::factory()->create();
        $this->actingAs($user);
        $uid = $user['id']; 
        
        // thread data
        $threadData = [
            'thetitle' => 'Test Thread Feature Test',
            'thebody' => 'can_create_post_if_authenticated_http',
            'user_id' => $uid,
         ];
 
        // Create the Thread
        $thread = $this->post('/store-thread', $threadData);

        // Post Data
        $postData = [
            'threadid' => '1',
            'user_id' => $uid,
            'newpost' => 'can_create_post_if_authenticated_http',
         ];

        // Create the Post
        $response = $this->post('/store-post', $postData);

        // Then
        $response->assertRedirect('/view-thread/1');
    }

    /** @test */
    // Cannot create a thread if user is NOT authenticated
    public function cannot_create_post_if_not_authenticated(): void
    {
        // When
        $response = $this->post('/store-post');
 
        // Then
        $response->assertRedirect('/login');
    }
}
