<?php

namespace Buxuhunao\Kic\Support;

use Buxuhunao\Kic\Http\Response;
use Buxuhunao\Kic\KfbIntelligentCloud;
use Illuminate\Support\Facades\Facade;

/**
 * @method static Response getUuid(string $uuid)
 * @method static Response bind(string $uuid, string $name, ?string $remark = null)
 * @method static Response unbind(string $uuid)
 * @method static Response info(string $uuid)
 * @method static Response list(int $page)
 * @method static Response capability(string $uuid)
 * @method static Response create(array $params)
 * @method static Response cancel(string $uuid)
 * @method static Response process(string $uuid, string $printUuid)
 * @method static Response reboot(string $uuid)
 * @method static Response headClean(string $uuid)
 * @method static Response flush(string $uuid)
 * @method static Response nozzleCheck(string $uuid)
 */
class KIC extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return KfbIntelligentCloud::class;
    }
}
