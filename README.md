<h1 align="center"> KFB Intelligent Cloud </h1>

<p align="center"> kic for Laravel.</p>


## Installing

```shell
$ composer require buxuhunao/kic -vvv
```

## Configuration

`configs/services`中添加服务配置

```
<?php

return [
    // ...
    
    'kic' => [
        'app_key' => env('KIC_APP_KEY'),
        'app_secret' => env('KIC_APP_SECRET'),
    ]
];
```

## Usage

```
使用Facade门面

\Buxuhunao\Kic\Support\KIC::getUuid($code)

或
/**
 * @var Kic $app
 */
$app = app(\Buxuhunao\Kic\KfbIntelligentCloud::class);
$app->getUuid($code)


可用方法：

// code换取uuid
$app->getUuid($code);

// 绑定设备
$app->bind($uuid, $name, $remark = '');

// 解绑设备
$app->unbind($uuid);

// 获取设备信息
$app->info($uuid);

// 获取设备列表
$app->list($page);

// 修改设备绑定信息
$app->edit($uuid, $name, $remark = null);

// 获取打印能力
$app->capability($uuid);

// 创建打印任务
$app->create($params);

// 取消打印机所有任务
$app->cancel($uuid);

// 查询打印任务进度
$app->process($uuid, $printUuid);

// 重启盒子
$app->reboot($uuid);

// 清洗打印机喷头
$app->headClean($uuid);

// 大墨量清洗打印机喷头
$app->flush($uuid);

// 打印喷嘴检查页
$app->nozzleCheck($uuid);
```

## Contributing

You can contribute in one of three ways:

1. File bug reports using the [issue tracker](https://github.com/buxuhunao/kfb-cloud/issues).
2. Answer questions or fix bugs on the [issue tracker](https://github.com/buxuhunao/kfb-cloud/issues).
3. Contribute new features or update the wiki.

_The code contribution process is not very formal. You just need to make sure that you follow the PSR-0, PSR-1, and PSR-2 coding guidelines. Any new code contributions must be accompanied by unit tests where applicable._

## License

MIT