<?php

declare(strict_types=1);

namespace App\Http\Middleware\Security;

use Closure;

final class SetReferrerPolicy
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // List of headers to remove
        $headers = config('panel.headers.referrer-policy', 'no-referrer');

        $response = $next($request);

        $response->headers->set('Referrer-Policy', $headers);

        return $response;
    }
}
