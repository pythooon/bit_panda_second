<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Throwable;

class Handler extends ExceptionHandler
{
    protected $dontReport = [
        //
    ];

    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    public function register()
    {
        $this->reportable(
            function (Throwable $e) {
                //
            }
        );
    }

    public function render($request, Throwable $exception)
    {
        switch ($exception) {
            case $exception instanceof InvalidArgumentException:
                $exception = new HttpException(400, $exception->getMessage(), $exception);
                break;
            default;
                break;
        }
        return parent::render($request, $exception);
    }
}
