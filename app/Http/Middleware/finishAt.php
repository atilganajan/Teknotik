<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class finishAt
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {


        $currentTime = now();
        Product::where('discount_finished_at', '<', $currentTime)->update([
            "status"=>"passive"

        ]);

        Product::where('product_finished_at', '<', $currentTime)->update([
            "status"=>"passive"

        ]);


        return $next($request);

    }
}
