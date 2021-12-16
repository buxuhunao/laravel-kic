<?php

namespace Buxuhunao\Kic\Providers;

use Illuminate\Contracts\Cache\Repository;
use Buxuhunao\Kic\Contracts\Storage;

class Illuminate implements Storage
{
    /**
     * The cache repository contract.
     *
     * @var Repository
     */
    protected Repository $cache;

    /**
     * Constructor.
     *
     * @param Repository $cache
     *
     * @return void
     */
    public function __construct(Repository $cache)
    {
        $this->cache = $cache;
    }

    /**
     * Add a new item into storage.
     *
     * @param  string  $key
     * @param  mixed  $value
     * @param  int  $seconds
     *
     * @return void
     */
    public function add($key, $value, $seconds)
    {
        $this->cache()->put($key, $value, $seconds);
    }

    /**
     * Add a new item into storage forever.
     *
     * @param  string  $key
     * @param  mixed  $value
     *
     * @return void
     */
    public function forever($key, $value)
    {
        $this->cache()->forever($key, $value);
    }

    /**
     * Get an item from storage.
     *
     * @param  string  $key
     *
     * @return mixed
     */
    public function get($key)
    {
        return $this->cache()->get($key);
    }

    /**
     * Remove an item from storage.
     *
     * @param  string  $key
     *
     * @return bool
     */
    public function destroy($key)
    {
        return $this->cache()->forget($key);
    }

    /**
     * Remove all items associated with the tag.
     *
     * @return void
     */
    public function flush()
    {
        $this->cache()->flush();
    }

    /**
     * Return the cache instance with tags attached.
     *
     * @return Repository
     */
    protected function cache()
    {
        return $this->cache;
    }
}
