<?php

declare(strict_types=1);

namespace App\Http\Reponses\Payment;

use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class PaymentResponse implements Responsable
{
    public function __construct(
        public readonly array|string $data,
        public readonly int $status = Response::HTTP_OK,
    ) {}

    public function toResponse($request): Response
    {
        $dataToResponse = [
            'data' => $this->data,
            'status' => $this->status,
        ];
        return new JsonResponse(
            data: $dataToResponse,
            status: $this->status,
        );
    }
}
