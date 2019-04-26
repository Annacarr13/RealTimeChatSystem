<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle(Request $request,Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {

          if(Auth()->user()->role == 'admin')
          {
              return Redirect()->to('/admin');
          }
          elseif(Auth()->user()->role == 'dean')
          {
              return Redirect()->to('/dean');
          }
          elseif(Auth()->user()->role == 'courseLeader')
          {
              return Redirect()->to('/course_leader');
          }
          else if(Auth()->user()->role == 'lecturer')
          {
              return Redirect()->to('/lecturer');
          }
          else if(Auth()->user()->role == 'student')
          {
              return Redirect()->to('/student');
          }
        }

        return $next($request);
    }
}
