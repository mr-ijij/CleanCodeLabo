<?php

declare(strict_types=1);

namespace Tests\Unit\Domains;

use App\Domains\Reservation;
use Carbon\Carbon;
use DomainException;
use Mockery;
use Tests\TestCase;

class ReservationTest extends TestCase
{
    public function test_無効な人数を持つ予約を作成できないこと(): void
    {
        $this->expectException(DomainException::class);

        new Reservation(
            Carbon::now(),
            'example@example.com',
            'Name',
            0
        );
    }
}
