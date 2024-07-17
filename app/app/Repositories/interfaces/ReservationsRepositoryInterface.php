<?php
declare(strict_types=1);

namespace App\Repositories\Interfaces;

use App\Domains\Reservation;
use Carbon\Carbon;

interface ReservationsRepositoryInterface
{
    /**
     * 予約を保存する
     *
     * @return \App\Domains\Reservation
     */
    public function save(
        Carbon $at,
        string $email,
        string $name,
        int $quantity
    ): Reservation;
}