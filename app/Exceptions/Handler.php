<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class Handler extends ExceptionHandler
{
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
            //
        });
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Throwable  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Throwable $exception)
    {
        // Если ресурс не найден в базе данных (ModelNotFoundException)
        if ($exception instanceof ModelNotFoundException) {
            // Перенаправляем запрос на другую страницу
            return back()->with('message', 'Извините это уже удалено');
        }

        // Если маршрут не найден (NotFoundHttpException)
        if ($exception instanceof NotFoundHttpException) {
            // Перенаправляем запрос на другую страницу
            return back();
        }

        return parent::render($request, $exception);
    }
}
