<?php

namespace App\Http\Middleware;

use Closure;
use Carbon\Carbon;
use App\RequestLog;

class RequestLogger
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
        if ($request->routeIs('analytics.dashboard')) {
            return $next($request);
        }

        $requestTime = Carbon::createFromTimestamp($_SERVER['REQUEST_TIME_FLOAT']);
        $data = [
            'ip' => $request->ip(),
            'url' => $request->fullUrl(),
            'user_agent' => $_SERVER['HTTP_USER_AGENT'],
            'method' => $request->method(),
            'response_time' => time() - $requestTime->timestamp,
        ];
        RequestLog::create($data);

        return $next($request);
    }
}