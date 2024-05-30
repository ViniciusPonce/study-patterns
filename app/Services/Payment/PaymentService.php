<?php

declare(strict_types=1);

namespace App\Services\Payment;

use App\Services\Payment\Handlers\OrderHandler;
use Illuminate\Support\Collection;

class PaymentService implements PaymentServiceInterface
{
    public function flowProcessPayment(Collection $order): array
    {
        $order = $this->handlerOrderPayment($order);

        return [
            'message' => 'Payment processed successfully with the following Chain of Responsibility trace',
            'trace' => $order->get('trace'),
        ];
    }

    private function handlerOrderPayment(Collection $order): Collection
    {
        $orderHandler = new OrderHandler();
        $order->put('trace', []);

        return $orderHandler->handle($order);
    }
}
