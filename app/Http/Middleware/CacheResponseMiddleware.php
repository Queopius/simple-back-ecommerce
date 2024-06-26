<?php

namespace App\Http\Middleware;

use Closure;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class CacheResponseMiddleware
{
    private $ttl;

    /**
     * Handle an incoming request.
     *
     * @param  Request  $request
     * @param  Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $ttl = null)
    {
        $this->ttl = $ttl ?? Carbon::now()->addDay();

        if (Cache::has($this->cacheKey($request))) {
            Cache::get($this->cacheKey($request));
        }

        return $next($request);
    }

    /**
     * Handle tasks after the response has been sent to the browser.
     *
     * @param  Request  $request
     * @param  \Illuminate\Http\Response  $response
     * @return void
     */
    public function terminate($request, $response)
    {
        if (Cache::has($this->cacheKey($request))) {
            return;
        }

        Cache::put($this->cacheKey($request), $response->getContent(), $this->ttl);
    }

    private function cacheKey($request): string
    {
        return md5($request->fullUrl() . '-' . auth()->id());
    }
}
