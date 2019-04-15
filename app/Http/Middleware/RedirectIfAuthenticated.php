<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

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
    public function handle($request, Closure $next, $guard = null)
    {
        switch ($guard) {
          case 'consumer':
            if (Auth::guard($guard)->check()) {
                return redirect()->route('consumer.home');
            }
          break;
          case 'admin':
            if (Auth::guard($guard)->check()) {
                return redirect()->route('admin.dashboard');
            }
            break;
          case 'showroomstaff':
            if (Auth::guard($guard)->check()) {
                return redirect()->route('showroom.show.dashboard');
            }
            break;
          default:
            if (Auth::guard($guard)->check()) {
                return redirect()->route('consumer.home');
            }
            break;
        }

        //if (Auth::guard($guard)->check()) {
        //    return redirect('/home');
        //}

        return $next($request);
    }
}
