<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReservationRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'date' => 'required|string',
            'email' => 'required|email',
            'name' => 'required|string',
            'quantity' => 'required|numeric',
        ];
    }

    public function getDate(): string
    {
        /** @var string $result */
        $result = $this->input('date');

        return $result;
    }

    public function getEmail(): string
    {
        /** @var string $result */
        $result = $this->input('email');

        return $result;
    }

    public function getName(): string
    {
        /** @var string $result */
        $result = $this->input('name');

        return $result;
    }

    public function getQuantity(): int
    {
        /** @var int $result */
        $result = $this->input('quantity');

        return $result;
    }
}
