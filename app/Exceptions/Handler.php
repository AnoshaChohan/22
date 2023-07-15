<?php

namespace App\Exceptions;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Auth;

class Handler extends ExceptionHandler
{
    protected function unauthenticated($request, AuthenticationException $exception)
{
if ($request->expectsJson()) {
return response()->json(['error' => 'Unauthenticated.'], 401);
}
if ($request->is('admin') || $request->is('admin/*')) {
return redirect()->guest('/login/admin');
}
if ($request->is('subscriber') || $request->is('subscriber/*')) {
    return redirect()->guest('/login/subscriber');
    }
    if ($request->is('unPaidUser') || $request->is('unPaidUser/*')) {
        return redirect()->guest('/login/unPaidUser');
        }
    
return redirect()->guest(route('login'));
}
}
