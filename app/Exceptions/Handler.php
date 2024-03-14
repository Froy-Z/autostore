<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Nette\Schema\ValidationException;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;
use Throwable;

class Handler extends ExceptionHandler
{
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    public function render($request, Throwable $e)
    {
        if ($e instanceof ValidationException) {
            return response()->json([
                'success' => false,
                'error' => "Ошибка валидации"
            ],$this->isHttpException($e) ? $e->getStatusCode() : 500);
        }

        if ($e instanceof UnauthorizedHttpException) {
            return response()->json([
                'success' => false,
                'error' => "Неавторизованный доступ"
            ],$this->isHttpException($e) ? $e->getStatusCode() : 401);
        }

        return parent::render($request, $e);
    }
}
