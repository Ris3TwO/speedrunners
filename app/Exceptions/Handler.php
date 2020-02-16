<?php

namespace App\Exceptions;

use Exception;
use App\Traits\ApiResponser;
use Asm89\Stack\CorsService;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Session\TokenMismatchException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class Handler extends ExceptionHandler
{
    use ApiResponser;
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

    /**
     * Report or log an exception.
     *
     * @param  \Exception  $exception
     * @return void
     *
     * @throws \Exception
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Exception
     */
    public function render($request, Exception $exception)
    {
        // Check header request and determine localizaton
        $local = ($request->hasHeader('X-localization')) ? $request->header('X-localization') : 'es';     // set laravel localization

        app()->setLocale($local);

        $response = $this->handleException($request, $exception);

        app(CorsService::class)->addActualRequestHeaders($response, $request);

        return $response;
    }

    public function handleException($request, Exception $exception)
    {
        if ($exception instanceof ModelNotFoundException && $request->wantsJson()) {
            $models = array('App\\');
            $change = '';
            return $this->errorResponse(trans('messages.entry_for') . str_replace($models, $change, $exception->getModel()) . trans('messages.not_found'), 404);
        }

        if ($exception instanceof AuthenticationException) {
            if ($request->expectsJson()) {
                return $this->errorResponse(trans('messages.no_authenticated'), 401);
            }

            return redirect()->guest(route('login'));
        }

        if ($exception instanceof AuthorizationException && $request->wantsJson()) {
            return $this->errorResponse(trans('messages.no_authorization'), 403);
        }

        if ($exception instanceof NotFoundHttpException && $request->wantsJson()) {
            return $this->errorResponse(trans('messages.url_not_found'), 404);
        }

        if ($exception instanceof MethodNotAllowedHttpException && $request->wantsJson()) {
            return $this->errorResponse(trans('messages.method_not_allowed'), 405);
        }

        if ($exception instanceof HttpException && $request->wantsJson()) {
            return $this->errorResponse($exception->getMessage(), $exception->getStatusCode());
        }

        if ($exception instanceof TokenMismatchException) {
            return redirect()->back()->withInput($request->input());
        }

        if (config('app.debug')) {
            return parent::render($request, $exception);
        }

        return $this->errorResponse(trans('messages.unexpected_problem'), 500);
    }
}
