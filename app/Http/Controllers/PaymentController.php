<?php

namespace App\Http\Controllers;

use App\Http\Reponses\Payment\PaymentResponse;
use App\Http\Requests\Payment\PaymentRequest;
use App\Services\Payment\PaymentServiceInterface;

class PaymentController extends Controller
{
    public function processPayment(PaymentRequest $request): PaymentResponse
    {
        $input = collect($request->validated());

        $chainService = app(PaymentServiceInterface::class);
        $response = $chainService->flowProcessPayment($input);

        return new PaymentResponse($response);
    }
}
