<?php

declare(strict_types=1);

namespace App\Domains;

use Carbon\Carbon;
use DomainException;

class Reservation
{
    /**
     * @param \Carbon\Carbon $at
     * @param string $email
     * @param string $name
     * @param int $quantity
     */
    public function __construct(
        private Carbon $at,
        private string $email,
        private string $name,
        private int $quantity
    ) {
        if ($quantity < 1) {
            throw new DomainException('Invalid quantity');
        }
    }

    public function getAt(): Carbon
    {
        return $this->at;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getQuantity(): int
    {
        return $this->quantity;
    }
}
