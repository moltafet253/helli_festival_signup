<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ShareSessionData
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // خواندن اطلاعات کاربر از session
        $nationalcode = "0371714941";

        // انتقال اطلاعات به فایل api.php
        config(['api.nationalcode' => $nationalcode]);

        return $next($request);
    }
}
