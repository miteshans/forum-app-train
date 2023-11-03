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
        
        // get user id
        $userid = $user['id']; 
        
        // thread data
        $threadData = [
            'thetitle' => 'Test Thread 1',
            'thebody' => 'This is the thread body content 1.',
         ];
 
        // Create the Thread
        $thread = $this->post('/store-thread', $threadData);

        // Post Data
        $postData = [
            'threadid' => '1',
            'user_id' => '16',
            'newpost' => 'This is the post content.',
         ];

        // Create the Post
        $response = $this->post('/store-post', $postData);

        // Then
        $response->assertRedirect('/view-thread/1');
    }
}
