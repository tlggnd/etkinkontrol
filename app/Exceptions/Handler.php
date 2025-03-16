<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response; // Bunu ekledik

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, string>
     */
    protected $dontReport = [
        //
    ];

    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
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
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            // Burada özel hata raporlama/loglama işlemleri yapabilirsiniz (isteğe bağlı)
        });
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Throwable  $e
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Throwable
     */
    public function render($request, Throwable $e): Response|JsonResponse
    {
        if ($e instanceof ValidationException && $request->expectsJson()) {
            return response()->json([
                'message' => 'Doğrulama hatası.', // Daha açıklayıcı bir mesaj
                'errors' => $e->errors(),
            ], 422);
        }

        return parent::render($request, $e);
    }
}