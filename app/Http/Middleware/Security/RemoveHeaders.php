<?php

declare(strict_types=1);

namespace App\Http\Middleware\Security;

use Closure;

final class RemoveHeaders
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $response = $next($request);

        // List of headers to remove
        $headers = config('panel.headers.remove', []); // ['X-Powered-By', 'Server]

        foreach ($headers as $header) {
            $response->headers->remove($header);
        }

        return $response;
    }
}
