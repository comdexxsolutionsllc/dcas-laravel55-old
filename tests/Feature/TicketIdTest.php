<?php

namespace Tests\Feature;

use Tests\TestCase;
use DCAS\Classes\TicketId;

class TicketIdTest extends TestCase
{
    /** @test */
    public function it_should_create_alphanumeric_ticket_ids()
    {
        $ticketId = TicketId::generateStatic();
        $this->assertRegExp("/[a-zA-Z0-9]/", $ticketId);

        $ticketId = (new TicketId)->generate();
        $this->assertRegExp("/[a-zA-Z0-9]/", $ticketId);
    }
}
