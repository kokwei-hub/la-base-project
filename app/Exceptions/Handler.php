<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Support\Facades\Log;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function render($request, Throwable $exception)
    {
        if ($request->expectsJson() && $exception instanceof \Symfony\Component\HttpKernel\Exception\HttpExceptionInterface) {
            $code = $exception->getStatusCode();

            if ($code == 500) {
                Log::channel('stack')->error('[E] ' . json_encode([
                    $exception->getMessage(),
                    request()->url(),
                    request()->all(),
                    $exception->getTraceAsString(),
                ]));
            }
        }

        return parent::render($request, $exception);
    }
}
