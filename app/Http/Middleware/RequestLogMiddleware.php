<?php

namespace App\Http\Middleware;

use App\Models\RequestLog;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RequestLogMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        RequestLog::create([
            'user_id' => Auth::user() ? Auth::user()->id : null,
            'service' => $this->getService($request),
            'request_body' => $request->getContent() ? $request->getContent() :  null,
            'http_response_status_code' => $response->status(),
            'body_response' => $response->getContent() ? $response->getContent() : null,
            'ip_origin' => $request->ip(),
        ]);

        return $response;
    }

    public function getService(Request $request): string
    {
        $path = $request->path();
        $queryString = $request->getQueryString();
        if ($queryString) {
            $path .= '?' . $queryString;
        }

        return $path;
    }
}
