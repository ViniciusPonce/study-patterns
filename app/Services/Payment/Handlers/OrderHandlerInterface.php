<?php

declare(strict_types=1);

namespace App\Services\Payment\Handlers;

use Illuminate\Support\Collection;

interface OrderHandlerInterface
{
    public function handle(Collection $order): Collection;

    public function setSuccessor(OrderHandlerInterface $param);
}
