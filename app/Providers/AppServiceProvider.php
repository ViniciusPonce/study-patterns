<?php

namespace App\Providers;

use App\Enums\Payment\ChainEnum;
use App\Handlers\Clients\MercadoPago\MercadoPagoClientHandler;
use App\Handlers\Clients\MercadoPago\MercadoPagoClientHandlerInterface;
use App\Handlers\Clients\PagBank\PagbankClientHandler;
use App\Handlers\Clients\PagBank\PagBankClientHandlerInterface;
use App\Handlers\HandlerInterface;
use App\Services\Payment\Handlers\OrderHandlerInterface;
use App\Services\Payment\Handlers\OrderHandler;
use App\Services\Payment\PaymentService;
use App\Services\Payment\PaymentServiceInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(PaymentServiceInterface::class, PaymentService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
