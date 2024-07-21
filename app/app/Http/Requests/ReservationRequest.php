<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

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
            'date' => 'required|string|date',
            'email' => 'required|email',
            'name' => 'required|string',
            'quantity' => 'required|numeric|min:1',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'errors' => $validator->errors(),
        ], 400));
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
