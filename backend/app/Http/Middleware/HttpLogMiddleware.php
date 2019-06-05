<?php

namespace App\Http\Middleware;

use Closure;
use Log;

class HttpLogMiddleware
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
        $response = $next($request);
        Log::info("{$request->method()}: {$request->url()} -> {$response->status()}");
        $header_txt = json_encode($request->header(), JSON_PRETTY_PRINT);
        Log::debug("HEADER: {$header_txt}");
        $input = json_encode($request->input(), JSON_PRETTY_PRINT);
        Log::info("BODY: {$input}");
        $content = json_encode(json_decode($response->content()), JSON_PRETTY_PRINT);
        Log::info("RESPONSE: {$content}");
        return $response;
    }
}
