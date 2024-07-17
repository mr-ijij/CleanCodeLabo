<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ReservationsControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testPostValidReservation(): void
    {
        $response = $this->post('/api/reservations', [
            'date' => '2023-03-10 19:00',
            'email' => 'katinka@eaxmple.com',
            'name' => 'Katinka Ingabogovinanana',
            'quantity' => 2,
        ]);

        $response->assertStatus(201);
    }
}
