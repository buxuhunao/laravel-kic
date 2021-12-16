<?php

namespace Buxuhunao\Kic\Contracts;

interface Storage
{
    /**
     * @param  string  $key
     * @param  mixed  $value
     * @param  int  $seconds
     *
     * @return void
     */
    public function add($key, $value, $seconds);

    /**
     * @param  string  $key
     * @param  mixed  $value
     *
     * @return void
     */
    public function forever($key, $value);

    /**
     * @param  string  $key
     *
     * @return mixed
     */
    public function get($key);

    /**
     * @param  string  $key
     *
     * @return bool
     */
    public function destroy($key);

    /**
     * @return void
     */
    public function flush();
}
