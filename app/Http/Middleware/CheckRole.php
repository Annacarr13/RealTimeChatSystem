<?php

namespace App\Http\Middleware;

use Closure;

class CheckRole
{

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @param $role
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {

        if ( strtolower($request->user()->role) != strtolower($role))
        {
            return Response('Not authorised actual:'.$request->user()->role.' required:'.$role);
//          return Redirect('no_access');
        }

        return $next($request);
    }
}
