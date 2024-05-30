<?php

declare(strict_types=1);

namespace App\Services\Payment;

use Illuminate\Support\Collection;

interface PaymentServiceInterface
{
    public function flowProcessPayment(Collection $order): array;
}
