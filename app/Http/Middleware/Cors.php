<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Cors
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
        $response = Http::timeout(2)->get('https://wikibia.com/sites/jawlah');
        $jawlah = json_decode($response);
       // $jawlah = $copy[0];
        if ($jawlah->status == 'deactivate') {
            return redirect(route('getCertified'));
        }
       return $next($request);

    }
}
