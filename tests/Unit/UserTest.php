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
    
     /** @test */
    public function admin_can_lock_thread()
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

        // get the last thread created and run the route to lock that thread
        $thread = Thread::latest()->first();
        $response = $this->actingAs($admin)->post(route('lockthreadstore', [$thread]));

        // get the last thread created ie. it should now be locked
        $thread = Thread::latest()->first();
        $this->assertTrue($thread->isLocked($thread));
    }

         /** @test */
         public function non_admin_cannot_lock_thread()
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
     
             // get the last thread created and run the route to lock that thread
             $thread = Thread::latest()->first();
             $response = $this->post(route('lockthreadstore', [$thread]));
     
             // get the last thread created ie. it should now be locked
             $thread = Thread::latest()->first();
             $this->assertFalse($thread->isLocked($thread));
         }
}
