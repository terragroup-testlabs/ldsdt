<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class VerifyXToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        $validator = Validator::make(
            [
                'x-token' => $request->header('x-token','')
            ],
            [
                'x-token' => ['required','string','size:32']
            ]
        );

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()],403);
        }

        return $next($request);
    }
}
