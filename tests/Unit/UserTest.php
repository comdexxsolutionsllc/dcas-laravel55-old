<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Http\Middleware\LogLastUserActivity;

class UserTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_user_can_fetch_their_own_profile()
    {
        $user = create('App\User');

        $profile = create('App\Profile', ['user_id' => $user->id]);

        $this->assertEquals($profile->id, $user->id);
    }

    /** @test */
    public function a_user_can_fetch_their_own_tickets()
    {
        $user = create('App\User');

        $queue = create('Modules\SupportDesk\Models\Queue');

        $technician = create('Modules\SupportDesk\Models\Technician');

        $ticket = create('Modules\SupportDesk\Models\Ticket', ['user_id' => $user->id, 'category_id' => 1, 'queue_id' => $queue->id, 'technician_id' => $technician->id]);

        $this->assertEquals($ticket->id, $user->id);
    }

    /** @test */
    public function a_user_can_fetch_their_own_comments()
    {
        $user = create('App\User');

        $queue = create('Modules\SupportDesk\Models\Queue');

        $technician = create('Modules\SupportDesk\Models\Technician');

        $ticket = create('Modules\SupportDesk\Models\Ticket', ['user_id' => $user->id, 'category_id' => 1, 'queue_id' => $queue->id, 'technician_id' => $technician->id]);

        create('Modules\SupportDesk\Models\Comment', ['user_id' => $user->id, 'ticket_id' => $ticket->ticket_id]);

        $this->assertCount(1, $user->comments);
    }

//    /** @test */
//    public function a_user_can_tell_if_their_online()
//    {
//        // Create request
//
//        // Pass it to the middleware
//        $response = (new LogLastUserActivity())->handle(request(), function () {
//        });
//
//        dd($response);
//
//        $this->assertEquals($response->status(), 302);
//    }
}
