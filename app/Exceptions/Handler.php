<?php

namespace App\Exceptions;
use Throwable;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\HttpException;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    public function render($request, Throwable $exception)
{
    if ($exception instanceof ModelNotFoundException) {
        return response()->json([
            'error' => 'Entry for '.str_replace('App\\', '', $exception->getModel()).' not found'], 404);
    } else if ($exception instanceof QueryException) {
        return response()->json([
            'error' => 'QueryError',
            'errors' => $exception
        ], 200);
    } else if ($exception instanceof NotFoundHttpException) {
        return response()->json([
            'error' => 'The requested resource was not found',
            'errors' => $exception
        ], 404);
    } else if ($exception instanceof MethodNotAllowedHttpException) {
        return response()->json([
            'error' => 'The requested resource was not found'], 405);
    }

    return parent::render($request, $exception);
}
}
