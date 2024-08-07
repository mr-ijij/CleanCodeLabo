<?php

namespace Tests\Unit\Controllers;

use App\Domains\Reservation;
use App\Http\Controllers\ReservationsController;
use App\Http\Requests\ReservationRequest;
use App\Repositories\Interfaces\ReservationsRepositoryInterface;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Mockery;
use Tests\TestCase;

class ReservationsControllerTest extends TestCase
{
    protected function tearDown(): void
    {
        Mockery::close();
    }

    public function testAdd_有効な予約をポストする(): void
    {
        /** @var ReservationsRepositoryInterface&\Mockery\MockInterface $mockRepository */
        $mockRepository = Mockery::mock(ReservationsRepositoryInterface::class);

        /** @var \Mockery\Expectation $expectation */
        $expectation = $mockRepository->shouldReceive('save');
        $expectation->once()
            ->with(
                Mockery::type(Carbon::class),
                Mockery::type('string'),
                Mockery::type('string'),
                Mockery::type('int')
            )
            ->andReturn(new Reservation(
                Carbon::parse('2023-07-08 19:00'),
                'test@example.com',
                'Test User',
                2
            ));
        $sut = new ReservationsController($mockRepository);

        $request = new ReservationRequest([
            'date' => '2023-07-08 19:00',
            'email' => 'test@example.com',
            'name' => 'Test User',
            'quantity' => 2
        ]);
        $response = $sut->add($request);

        $this->assertEquals(201, $response->getStatusCode());
        /** @var array<mixed> $result */
        $result = $response->getOriginalContent();
        $this->assertInstanceOf(Reservation::class, $result['data']);
    }
}
