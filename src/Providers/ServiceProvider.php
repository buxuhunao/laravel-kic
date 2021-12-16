<?php

namespace Buxuhunao\Kic\Providers;

use Buxuhunao\Kic\Auth;
use Buxuhunao\Kic\KfbIntelligentCloud;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    protected bool $defer = true;

    public function register()
    {
        $this->app->singleton('buxuhunao.kic.storage', function () {
            return $this->app->make(Illuminate::class);
        });

        $this->app->singleton(Auth::class, function ($app) {
            return new Auth($this->config(), $app['buxuhunao.kic.storage']);
        });

        $this->app->singleton(KfbIntelligentCloud::class, function () {
            return new KfbIntelligentCloud($this->config());
        });
    }

    public function provides(): array
    {
        return [KfbIntelligentCloud::class];
    }

    protected function config()
    {
        return config('services.kic');
    }
}
