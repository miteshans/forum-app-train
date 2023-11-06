<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Thread;

class UserTest extends TestCase
{
    use RefreshDatabase; 
    
    public function testAdminCanLockThread()
    {
        // Create an admin user
        $admin = User::factory()->create(['is_admin' => true]); 
        $userid = $admin['id'];

        // Create a thread
        Thread::create([
            'title' => 'Admin can lock a Thread',
            'body' => 'testAdminCanLockThread',
            'user_id' => $userid,
            'locked' => 0
        ]);

        // get the last thread created and run the route to lock a thread
        $thread = Thread::latest()->first();
        $response = $this->actingAs($admin)->post(route('lockthreadstore', [$thread]));

        // get the last thread created
        $thread = Thread::latest()->first();
        $this->assertTrue($thread->isLocked($thread));
    }
}
