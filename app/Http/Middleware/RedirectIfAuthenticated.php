<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
<<<<<<< HEAD
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param  string|null  ...$guards
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
=======
   
>>>>>>> 2be6753ff08d45c60e1edbdf6f33fe1c312912bb
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
<<<<<<< HEAD
                return redirect(RouteServiceProvider::HOME);
=======
                return redirect('/'.$guard);
>>>>>>> 2be6753ff08d45c60e1edbdf6f33fe1c312912bb
            }
        }

        return $next($request);
    }
}
