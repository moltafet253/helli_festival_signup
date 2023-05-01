<?php

namespace App\Http\Middleware;

use App\Models\UserActivityLog;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Jenssegers\Agent\Agent;
use Symfony\Component\HttpFoundation\Response;

class CheckSession extends \App\Http\Controllers\VueController
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->session()->get('token') and $request->session()->get('nationalcode')){
            return $next($request);
        } else {
            $agent = new Agent();
            UserActivityLog::firstorcreate([
                'activity' => 'Session Denied',
                'ip_address' => request()->ip(),
                'user_agent' => request()->userAgent(),
                'device' => $agent->device(),
            ]);
            return redirect('http://login.ismc.ir/?refurl=http://ssmp.ismc.ir', 302);
        }
    }
}
