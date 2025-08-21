<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * As exceções que não devem ser reportadas.
     */
    protected $dontReport = [
        //
    ];

    /**
     * Inputs que nunca devem ser exibidos em erros de validação.
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Reportar ou logar a exceção.
     */
    public function report(Throwable $e): void
    {
        parent::report($e);
    }

    /**
     * Renderizar a exceção em resposta HTTP.
     */
    public function render($request, Throwable $e)
    {
        if ($e instanceof AppException) {
            if (env('APP_ENV') == 'local') {
                dd($e->getMessage());
            };

            return redirect()
                ->back()
                ->withInput()
                ->withErrors($e->getMessage());
        }

        return parent::render($request, $e);
    }
}