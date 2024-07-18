<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReservationRequest;
use App\Repositories\Interfaces\ReservationsRepositoryInterface;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;

class ReservationsController extends Controller
{
    use AuthorizesRequests;
    use ValidatesRequests;

    public function __construct(
        protected ReservationsRepositoryInterface $reservationsRepository,
    ) {
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function add(ReservationRequest $request): JsonResponse
    {
        $result = $this->reservationsRepository->save(
            Carbon::parse($request->getDate()),
            $request->getEmail(),
            $request->getName(),
            $request->getQuantity()
        );

        return response()->json(
            [
                'data' => $result,
            ],
            201
        );
    }
}
