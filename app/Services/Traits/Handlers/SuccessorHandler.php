<?php

declare(strict_types=1);

namespace App\Services\Traits\Handlers;

use App\Services\Payment\Handlers\OrderHandlerInterface;

trait SuccessorHandler
{
    private function setSuccessors(): void
    {
        if (!property_exists($this, 'handlers')) {
            return;
        }

        /** @var OrderHandlerInterface $lastHandler */
        $lastHandler = null;

        foreach ($this->handlers as $handler) {
            if (!$this->handler) {
                $this->handler = new $handler();
                $lastHandler = $this->handler;
                continue;
            }

            $newHandler = new $handler();
            $lastHandler->setSuccessor($newHandler);
            $lastHandler = $newHandler;
        }
    }
}
