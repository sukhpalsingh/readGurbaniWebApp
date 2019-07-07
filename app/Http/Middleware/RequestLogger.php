<?php

namespace App\Http\Middleware;

use Closure;
use Carbon\Carbon;
use App\RequestLog;
use App\IpLocation;
use Illuminate\Http\Request;

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
        if ($request->is('dashboard*')) {
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
        $requestLog = RequestLog::create($data);

        IpLocation::firstOrCreate(['ip' => $requestLog->ip]);

        return $next($request);
    }
}
