<?php

namespace App\Http\Middleware;

use Closure;
use App\Customer;
use Session;

class DashboardMiddleware
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
        if (empty(Session::get('phone'))) {
            return redirect('/phone');   
        }

        $row = Customer::where('phone', Session::get('phone'))->first();
        if ($row) {
            return $next($request);    
        }
        
    }
}
