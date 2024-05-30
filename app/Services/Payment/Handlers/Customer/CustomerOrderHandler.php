<?php

namespace App\Services\Payment\Handlers\Customer;

use App\Services\Payment\Handlers\OrderHandlerInterface;
use Illuminate\Support\Collection;

class CustomerOrderHandler implements OrderHandlerInterface
{
    private ?OrderHandlerInterface $successor = null;

    public function setSuccessor(OrderHandlerInterface $param): void
    {
        $this->successor = $param;
    }

    public function handle(Collection $order): Collection
    {
        $order = $this->customerHandler($order);

        if ($this->successor) {
            return $this->successor->handle($order);
        }

        return $order;
    }

    private function customerHandler(Collection $order): Collection
    {
        $order->put('trace', [...$order->get('trace'), class_basename($this)]);
        // todo: implement customer handler
        return $order;
    }
}
