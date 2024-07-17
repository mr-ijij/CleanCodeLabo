<?php

declare(strict_types=1);

namespace App\Repositories\Concrete;

use App\Domains\Reservation;
use App\Models\Reservation as ModelsReservation;
use App\Repositories\Interfaces\ReservationsRepositoryInterface;
use Carbon\Carbon;

class ReservationsRepository implements ReservationsRepositoryInterface
{
    public static function create(): self
    {
        return new self();
    }

    public function __construct()
    {
    }

    /**
     * @return \App\Domains\Reservation
     */
    public function save(
        Carbon $at,
        string $email,
        string $name,
        int $quantity
    ): Reservation {
        ModelsReservation::firstOrCreate([
            'at' => $at,
            'email' => $email,
            'name' => $name,
            'quantity' => $quantity,
        ]);

        return new Reservation($at, $email, $name, $quantity);
    }
}
