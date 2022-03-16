<?php

namespace Buxuhunao\Kic;

use Buxuhunao\Kic\Middleware\AccessToken;

class KfbIntelligentCloud extends Client
{
    public function __construct($config)
    {
        parent::__construct($config);

        $this->pushMiddleware(new AccessToken());
    }

    /*
    |--------------------------------------------------------------------------
    | 设备管理
    |--------------------------------------------------------------------------
    */
    // code换取uuid
    public function getUuid($code)
    {
        $uri = '/api/client/get_uuid';

        return $this->get($uri, ['query' => ['code' => $code]]);
    }

    // 绑定设备
    public function bind($uuid, $name, $remark = '')
    {
        $uri = '/api/client/bind';

        return $this->post($uri, ['json' => compact('uuid', 'name', 'remark')]);
    }

    // 解绑设备
    public function unbind($uuid)
    {
        $uri = '/api/client/unbind';

        return $this->post($uri, ['json' => ['uuid' => $uuid]]);
    }

    // 获取设备信息
    public function info($uuid)
    {
        $uri = '/api/client/info';

        return $this->get($uri, ['query' => ['uuid' => $uuid]]);
    }

    // 获取设备列表
    public function list($page = 1)
    {
        $uri = '/api/client/list';

        return $this->get($uri, ['query' => ['page' => $page]]);
    }

    // 修改设备绑定信息
    public function edit($uuid, $name, $remark = null)
    {
        $uri = '/api/client/edit';
        $option = array_filter(compact('uuid', 'name', 'remark'));

        return $this->post($uri, ['json' => $option]);
    }

    /*
    |--------------------------------------------------------------------------
    | 打印能力
    |--------------------------------------------------------------------------
    */
    // 获取打印机能力
    public function capability($uuid)
    {
        $uri = '/api/print/capability';

        return $this->get($uri, ['query' => ['client_uuid' => $uuid]]);
    }

    // 创建打印任务
    public function create($params)
    {
        $uri = '/api/print/create';

        return $this->post($uri, ['json' => $params]);
    }

    // 取消打印机所有任务
    public function cancel($uuid)
    {
        $uri = '/api/print/cancel';

        return $this->post($uri, ['json' => ['client_uuid' => $uuid]]);
    }

    // 查询打印任务进度
    public function process($uuid, $printUuid)
    {
        $uri = ' /api/print/info';

        return $this->post($uri, ['json' => [
            'client_uuid' => $uuid,
            'print_uuid' => $printUuid
        ]]);
    }

    /*
    |--------------------------------------------------------------------------
    | 设备控制
    |--------------------------------------------------------------------------
    */
    // 重启盒子
    public function reboot($uuid)
    {
        $uri = '/api/control/reboot';

        return $this->post($uri, ['json' => ['client_uuid' => $uuid]]);
    }

    // 清洗打印机喷头
    public function headClean($uuid)
    {
        $uri = '/api/control/head_clean';

        return $this->post($uri, ['json' => ['client_uuid' => $uuid]]);
    }

    // 大墨量清洗打印机喷头
    public function flush($uuid)
    {
        $uri = '/api/control/power_ink_flush';

        return $this->post($uri, ['json' => ['client_uuid' => $uuid]]);
    }

    // 打印喷嘴检查页
    public function nozzleCheck($uuid)
    {
        $uri = '/api/control/nozzle_check';

        return $this->post($uri, ['json' => ['client_uuid' => $uuid]]);
    }
}
