<?php

namespace App\Http\Middleware;

use Closure;

class DisableRedirectUrl
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
        $referer = $request->header('referer');
        if(empty($referer)) {
            abort(401, 'Unauthorized action.');
//            return redirect()->to('cart');
        }
        return $next($request);
    }
}
