<?php

use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'payment'], function () {
    Route::post('/process', [PaymentController::class, 'processPayment']);
});
