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

        $paymentService = app(PaymentServiceInterface::class);
        $response = $paymentService->flowProcessPayment(order: $input);

        return new PaymentResponse(data: $response);
    }
}
