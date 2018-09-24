<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $routeRole)
    {
        if (Auth::check()) {
            $userRole = Auth::user()->role;

            if ($routeRole == 'user') {
                if ($userRole == 'user' || $userRole == 'company' || $userRole == 'pencetak' || $userRole == 'pegawai_admin' || $userRole == 'admin' || $userRole == 'super_admin') {
                    return $next($request); //izinkan masuk page mana
                }
            }

            if ($routeRole == 'company') {
                if ($userRole == 'company' || $userRole == 'pencetak' || $userRole == 'akauntan' || $userRole == 'pegawai_admin' || $userRole == 'admin' || $userRole == 'super_admin') {
                    return $next($request); //izinkan masuk page mana
                }
            }

            if ($routeRole == 'pencetak') {
                if ($userRole == 'pencetak' || $userRole == 'pegawai_admin' || $userRole == 'admin' || $userRole == 'super_admin') {
                    return $next($request); //izinkan masuk page mana
                }
            }

            if ($routeRole == 'akauntan') {
                if ($userRole == 'akauntan' || $userRole == 'pegawai_admin' || $userRole == 'admin' || $userRole == 'super_admin') {
                    return $next($request); //izinkan masuk page mana
                }
            }

            if ($routeRole == 'pegawai_admin') {
                if ($userRole == 'pegawai_admin' || $userRole == 'admin' || $userRole == 'super_admin') {
                    return $next($request); //izinkan masuk page mana
                }
            }

            if ($routeRole == 'admin') {
                if ($userRole == 'admin' || $userRole == 'super_admin') {
                    return $next($request); //izinkan masuk page mana
                }
            }

            if ($routeRole == 'super_admin') {
                if ($userRole == 'super_admin') {
                    return $next($request); //izinkan masuk page mana
                }
            }

            abort(403);
            dd('if you see this page check you role middleware');

        } else {

            return redirect('login');
        }
    }
}
