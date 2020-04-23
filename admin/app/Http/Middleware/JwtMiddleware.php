<?php

namespace App\Http\Middleware;

use Closure;

class JwtMiddleware
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
        try {
            $token = auth('api')->payload();
        } catch (\Throwable $th) {
            if ($th instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException){
                return response()->json(['error' => 'Token is Invalid'], 401);
            }else if ($th instanceof \Tymon\JWTAuth\Exceptions\TokenExpiredException){
                return response()->json(['error' => 'Token is Expired'], 401);
            }else{
                return response()->json(['error' => 'Authorization Token not found'], 401);
            }
        }
        return $next($request);
    }
}
