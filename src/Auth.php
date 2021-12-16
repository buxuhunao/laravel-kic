<?php

namespace Buxuhunao\Kic;

use Buxuhunao\Kic\Contracts\Storage;

class Auth extends Client
{
    public function __construct(array $config, protected Storage $storage)
    {
        parent::__construct($config);
    }

    public function getToken(): string
    {
        if ($token = $this->storage->get($this->getCacheKey())) {
            return $token;
        }

        $response = $this->post('/api/auth', ['json' => $this->config])->toArray();

        $token = $response['data']['token'];
        $expired = $response['data']['expires_at'] - time() - 300;
        $this->storage->add($this->getCacheKey(), $token, $expired);

        return $token;
    }

    protected function getCacheKey(): string
    {
        return sprintf('kfb.%s.access_token', $this->config->get('app_key'));
    }
}
