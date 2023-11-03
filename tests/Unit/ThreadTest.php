<?php
namespace Tests\Unit;

use App\Models\Thread;
use App\Models\User;
//use PHPUnit\Framework\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ThreadTest extends TestCase
{
    /** @test */
    //Create a thread in the database if authenticated
    public function can_create_thread_if_authenticated_db(): void
    {
        $user = User::factory()->create();
        $userid = $user['id'];

        $thread = Thread::create([
            'title' => 'Create Thread in DB',
            'body' => 'can_create_thread_if_authenticated_db',
            'user_id' => $userid
        ]);

        // Assert that the thread was created
        $this->assertDatabaseHas('threads', [
            'title' => 'Create Thread in DB',
            'body' => 'can_create_thread_if_authenticated_db',
            'user_id' => $userid
        ]);

        // Check userid matches user in thread
        $this->assertEquals($userid, $thread->user_id);
    }

    /** OF COURSE THIS IS GOING TO THROW SQL ERRORS DUE TO CONSTRAINTS - SHOULD THIS BE TESTED IF SO HOW? */
    /** @test */
    // public function unauthenticated_user_cannot_create_thread(): void
    // {
    //     // Create an array with the data for the thread
    //     $threadData = [
    //         'title' => 'Test Thread 4',
    //         'body' => 'This is the thread body content 4',
    //     ];

    //     // Try and create a thread in the database without authentication
    //     $createdThread = Thread::create($threadData);

    //     // Assert that the createdThread is null
    //     $this->assertNull($createdThread);

    //     // Assert that the thread was not created in the database
    //     $this->assertDatabaseMissing('threads', $threadData);
    // }
}
