<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Log;
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

    /**
     * @return array<mixed>
     */
    public static function dataProvider_testInvalidPostValidReservation(): array
    {
        return [
            'dateが存在しない' => [
                'data' => [
                    // 'date' => '2023-07-08 19:00',
                    'email' => 'test@example.com',
                    'name' => 'Test User',
                    'quantity' => 2,
                ],
            ],
            'dateが適当な文字列' => [
                'data' => [
                    'date' => 'not a date',
                    'email' => 'test@example.com',
                    'name' => 'Test User',
                    'quantity' => 2,
                ],
            ],
            'emailがnull' => [
                'data' => [
                    'date' => '2023-07-08 19:00',
                    'email' => null,
                    'name' => 'Test User',
                    'quantity' => 2,
                ],
            ],
            'quantityが0' => [
                'data' => [
                    'date' => '2023-07-08 19:00',
                    'email' => 'test@example.com',
                    'name' => 'Test User',
                    'quantity' => 0,
                ],
            ],
            'quantityがマイナス値' => [
                'data' => [
                    'date' => '2023-07-08 19:00',
                    'email' => 'test@example.com',
                    'name' => 'Test User',
                    'quantity' => -1,
                ],
            ],
            'nameがnull' => [
                'data' => [
                    'date' => '2023-07-08 19:00',
                    'email' => 'test@example.com',
                    'name' => null,
                    'quantity' => 1,
                ],
            ],
        ];
    }

    /**
     * @dataProvider dataProvider_testInvalidPostValidReservation
     *
     * @param array<mixed> $data
     */
    public function testInvalidPostValidReservation(array $data): void
    {
        $response = $this->post('/api/reservations', $data);

        $response->assertStatus(400);
    }
}
