<?php

declare(strict_types=1);

namespace App\Constants\Payment\Handlers;

use App\Services\Payment\Handlers\Customer\CustomerOrderHandler;
use App\Services\Payment\Handlers\Payment\PaymentOrderHandler;

class HandlersConstants
{
    public const HANDLERS = [
        CustomerOrderHandler::class,
        PaymentOrderHandler::class
    ];
}
