<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Exceptions\PostTooLargeException;

class CheckPostSize
{
    public function handle($request, Closure $next)
    {
        $maxSize = 20971520; // 20MB in bytes

        if ($request->server('CONTENT_LENGTH') > $maxSize) {
            throw new PostTooLargeException('Request size exceeds the maximum allowed size.');
        }

        return $next($request);
    }
}
