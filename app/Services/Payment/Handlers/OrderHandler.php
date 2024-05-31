<?php

declare(strict_types=1);

namespace App\Services\Payment\Handlers;

use App\Constants\Payment\Handlers\HandlersConstants;
use App\Services\Traits\Handlers\SuccessorHandler;
use Illuminate\Support\Collection;

class OrderHandler
{
    use SuccessorHandler;

    private array $handlers = HandlersConstants::HANDLERS;

    private ?OrderHandlerInterface $handler = null;

    public function __construct()
    {
        $this->setSuccessors();
    }

    public function handle(Collection $order): Collection
    {
        return $this->handler->handle(order: $order);
    }
}
