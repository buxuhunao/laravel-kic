<?php

namespace Buxuhunao\Kic\Middleware;

use Buxuhunao\Kic\Auth;
use Closure;
use Psr\Http\Message\RequestInterface;

class AccessToken
{
    public function __invoke(callable $handler): Closure
    {
        return function (RequestInterface $request, array $options) use ($handler) {
            $request = $request->withHeader('Authorization', app(Auth::class)->getToken());

            return $handler($request, $options);
        };
    }
}
