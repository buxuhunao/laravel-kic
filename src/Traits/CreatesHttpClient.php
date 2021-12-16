<?php

namespace Buxuhunao\Kic\Traits;

use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;

trait CreatesHttpClient
{
    protected array $options = [];
    protected array $middlewares = [];
    protected ?HandlerStack $handlerStack = null;

    /**
     * @param array $options
     *
     * @return Client
     */
    public function createHttpClient(array $options = []): Client
    {
        return new Client(array_merge(
            ['handler' => $this->getHandlerStack()],
            $this->options,
            $options
        ));
    }

    /**
     * @param  array  $options
     *
     * @return $this
     */
    public function setHttpClientOptions(array $options): static
    {
        $this->options = $options;

        return $this;
    }

    public function getHttpClientOptions(): array
    {
        return $this->options;
    }

    /**
     * Add a middleware.
     *
     * @param callable    $middleware
     * @param string|null $name
     *
     * @return $this
     */
    public function pushMiddleware(callable $middleware, string $name = null): static
    {
        if (! is_null($name)) {
            $this->middlewares[$name] = $middleware;
        } else {
            $this->middlewares[] = $middleware;
        }

        return $this;
    }

    /**
     * Return all middlewares.
     *
     * @return array
     */
    public function getMiddlewares(): array
    {
        return $this->middlewares;
    }

    /**
     * @param  array  $middlewares
     *
     * @return $this
     */
    public function setMiddlewares(array $middlewares): static
    {
        $this->middlewares = $middlewares;

        return $this;
    }

    /**
     * @param HandlerStack $handlerStack
     *
     * @return $this
     */
    public function setHandlerStack(HandlerStack $handlerStack): static
    {
        $this->handlerStack = $handlerStack;

        return $this;
    }

    /**
     * Build a handler stack.
     *
     * @return HandlerStack
     */
    public function getHandlerStack(): HandlerStack
    {
        if ($this->handlerStack) {
            return $this->handlerStack;
        }

        $this->handlerStack = HandlerStack::create();

        foreach ($this->middlewares as $name => $middleware) {
            $this->handlerStack->unshift($middleware, $name);
        }

        return $this->handlerStack;
    }
}
