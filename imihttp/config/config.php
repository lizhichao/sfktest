<?php
return [
    // 项目根命名空间
    'namespace'   => 'ImiApp',

    // 配置文件
    'configs'     => [
        'beans' => __DIR__ . '/beans.php',
    ],

    // 扫描目录
    'beanScan'    => [
        'ImiApp\Listener',
        'ImiApp\Task',
    ],

    // 组件命名空间
    'components'  => [
    ],

    // 主服务器配置
    'mainServer'  => [
        'namespace' => 'ImiApp\ApiServer',
        'type'      => Imi\Server\Type::HTTP,
        'host'      => '0.0.0.0',
        'port'      => 9501,
        'configs'   => [
            // 'worker_num'        =>  8,
            // 'task_worker_num'   =>  16,
        ],
    ],

    // 子服务器（端口监听）配置
    'subServers'  => [
        // 'SubServerName'   =>  [
        //     'namespace'    =>    'ImiApp\XXXServer',
        //     'type'        =>    Imi\Server\Type::HTTP,
        //     'host'        =>    '127.0.0.1',
        //     'port'        =>    13005,
        // ]
    ],

    // 连接池配置
    'pools'       => [
        // 主数据库
        'maindb' => [
            // 同步池子
            'sync'  => [
                'pool'     => [
                    'class'  => \Imi\Db\Pool\SyncDbPool::class,
                    'config' => [
                        'maxResources' => 10,
                        'minResources' => 0,
                    ],
                ],
                'resource' => [
                    'host'     => '127.0.0.1',
                    'port'     => 3306,
                    'username' => 'root',
                    'password' => '123456',
                    'database' => 'test',
                    'charset'  => 'utf8mb4',
                ],
            ],
            // 异步池子，worker进程使用
            'async' => [
                'pool'     => [
                    'class'  => \Imi\Db\Pool\CoroutineDbPool::class,
                    'config' => [
                        'maxResources' => 10,
                        'minResources' => 0,
                    ],
                ],
                'resource' => [
                    'host'     => '127.0.0.1',
                    'port'     => 3306,
                    'username' => 'root',
                    'password' => '123456',
                    'database' => 'test',
                    'charset'  => 'utf8mb4',
                ],
            ]
        ],
        // 'redis'    =>    [
        //     'sync'    =>    [
        //         'pool'    =>    [
        //             'class'        =>    \Imi\Redis\SyncRedisPool::class,
        //             'config'    =>    [
        //                 'maxResources'    =>    10,
        //                 'minResources'    =>    0,
        //             ],
        //         ],
        //         'resource'    =>    [
        //             'host'      => '127.0.0.1',
        //             'port'      => 6379,
        //             'password'  => null,
        //         ]
        //     ],
        //     'async'    =>    [
        //         'pool'    =>    [
        //             'class'        =>    \Imi\Redis\CoroutineRedisPool::class,
        //             'config'    =>    [
        //                 'maxResources'    =>    10,
        //                 'minResources'    =>    0,
        //             ],
        //         ],
        //         'resource'    =>    [
        //             'host'      => '127.0.0.1',
        //             'port'      => 6379,
        //             'password'  => null,
        //         ]
        //     ],
        // ],
    ],

    // 数据库配置
    'db'          => [
        // 数默认连接池名
        'defaultPool' => 'maindb',
    ],

    // redis 配置
    'redis'       => [
        // 数默认连接池名
        'defaultPool' => 'redis',
    ],

    // 内存表配置
    'memoryTable' => [
        // 't1'    =>  [
        //     'columns'   =>  [
        //         ['name' => 'name', 'type' => \Swoole\Table::TYPE_STRING, 'size' => 16],
        //         ['name' => 'quantity', 'type' => \Swoole\Table::TYPE_INT],
        //     ],
        //     'lockId'    =>  'atomic',
        // ],
    ],

    // 锁
    'lock'        => [
        // 'list'  =>  [
        //     'atomic' =>  [
        //         'class' =>  'AtomicLock',
        //         'options'   =>  [
        //             'atomicName'    =>  'atomicLock',
        //         ],
        //     ],
        // ],
    ],

    // atmoic 配置
    'atomics'     => [
        // 'atomicLock'   =>  1,
    ],
];
