<?php

namespace Tests\Unit;
use App\Models\Thread;

use PHPUnit\Framework\TestCase;

class PostTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_example(): void
    {
        $this->assertTrue(true);
    }

    /** @test */
    //Create a thread in the database
    public function can_create_post_if_authenticated_db(): void
    {
        // $thread = Thread::create([
        //     'title' => 'Test Thread 2',
        //     'body' => 'This is the thread body content 2',
        //     'user_id' => 1
        // ]);

        // $thread->save();
        // var_dump($thread);
        // die();
    }
}
