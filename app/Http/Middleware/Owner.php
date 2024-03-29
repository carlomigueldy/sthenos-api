<?php

namespace App\Http\Middleware;

use Closure;

class Owner
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($request->user()->role->name == 'Customer') {
            return response()->json([
                'message' => 'Unauthorized. You are not an owner.'
            ]);
        } else {
            return $next($request);
        }
    }
}
