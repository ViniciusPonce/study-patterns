<?php

namespace App\Services\Payment\Handlers\Payment;

use App\Services\Payment\Handlers\OrderHandlerInterface;
use Illuminate\Support\Collection;

class PaymentOrderHandler implements OrderHandlerInterface
{
    private ?OrderHandlerInterface $successor = null;

    public function setSuccessor(OrderHandlerInterface $param): void
    {
        $this->successor = $param;
    }

    public function handle(Collection $order): Collection
    {
        $order = $this->paymentHandler($order);

        if ($this->successor) {
            return $this->successor->handle($order);
        }

        return $order;
    }

    private function paymentHandler(Collection $order): Collection
    {
        $order->put('trace', [...$order->get('trace'), class_basename($this)]);
        // todo: implement payment handler
        return $order;
    }
}
