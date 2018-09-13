<?php

namespace App\Http\Middleware;

use App\AuditTrail;
use Closure;
use Auth;
use Request;

class AuditTrailMiddleware
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
        if (Auth::check()) {        // kalau dia dah login, akan jadi true
            $audit = new AuditTrail();
            $audit->ip = Request::ip();
            $audit->url = Request::url();
            $audit->user_id = Auth::user()->id;
            $audit->save();
        } else {
            return redirect('login');
        }

        return $next($request);
    }
}
