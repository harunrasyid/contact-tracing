<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class checkEmail
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if($request->User()->email_verified_at != NULL){
            return $next($request);
        }

        return redirect('/belum-verifikasi');
    }
}
