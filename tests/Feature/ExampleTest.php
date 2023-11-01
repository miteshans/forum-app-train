<?php

namespace Tests\Feature;
use App\Models\User;

//use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    //use RefreshDatabase;

    /**
     * A basic test example.
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_LoggedOut(): void
    {
        $response = $this->get('/latest-threads');

        $response->assertStatus(302)
            ->assertRedirect('/login');
    }

    public function test_mytesting(): void
    {
        
        // $user = User::factory()->create();
        
        // $this->actingAs($user);
        
        // //$name = "John";
        //  $name = "Jack";
        //  echo $user->name;
        // $this->assertTrue($name == "Jack");

         // Create an authenticated user
         $user = User::factory()->create();
         $this->actingAs($user);
 
         // Replace 'YourThreadModel' with the actual model name for threads
         $threadData = [
             'thetitle' => 'Test Thread',
             'thebody' => 'This is the thread body content.',
         ];
 
         // Use the route, controller, and method for creating threads in your application
         $response = $this->post('/store-thread', $threadData);
 

         //$response->assertStatus(302); // Adjust the status code as per your application's response
 
        // Assert that the response is a redirect and that it redirects to the expected URL
        $response->assertRedirect('/threads/1'); // Replace with the actual URL pattern

    }
}
