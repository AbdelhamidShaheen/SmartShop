<?php

namespace App\Http\Middleware;

use App\RestResponseTrait;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckUserType
{
    use RestResponseTrait;
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next,string $userType): Response
    {
        if ($request->user()->user_type !== $userType) {
            return $this->error('Unauthorized', Response::HTTP_UNAUTHORIZED);
        }

        return $next($request);
    }
}
