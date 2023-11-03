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
}
