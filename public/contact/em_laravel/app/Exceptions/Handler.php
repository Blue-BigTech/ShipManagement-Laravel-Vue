<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

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
      // 飛んできた例外がTokenMismatchExceptionのインスタンスなら(csrf起因の例外なら)
      if($exception instanceof \Illuminate\Session\TokenMismatchException) {
        // if(Auth::check()){
        //   return back()
        //   ->withErrors(['csrf' => [ __( "auth.expired" )]]);
        // }
        return back()
        ->withErrors(['csrf' => [ __( "auth.page_expired" )]]);
      }
        return parent::render($request, $exception);
    }
}
