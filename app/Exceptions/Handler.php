<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {

        });
    }

    /**
     * Render an exception into an HTTP response.
     */
    public function render($request, Throwable $e): JsonResponse
    {
        $message = $e->getMessage();
        $status = $e->status ?? Response::HTTP_INTERNAL_SERVER_ERROR;

        if ($e instanceof ValidationException) {
            $message = $e->validator->errors();
        }

        $reponse = [
            'error' => $message,
            'status' => $status,
        ];

        return response()->json(data: $reponse, status: $status);
    }
}
