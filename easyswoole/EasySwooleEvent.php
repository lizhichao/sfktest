<?php

namespace EasySwoole\EasySwoole;
use EasySwoole\EasySwoole\Swoole\EventRegister;
use EasySwoole\EasySwoole\AbstractInterface\Event;
use EasySwoole\Http\Request;
use EasySwoole\Http\Response;


class EasySwooleEvent implements Event
{
    public static function initialize()
    {
//        $configData = GConfig::getInstance()->getConf('MYSQL');
//        $config = new Config($configData);
//        $poolConf = Mysql::getInstance()->register('mysql',$config);
        // TODO: Implement initialize() method.
        date_default_timezone_set('Asia/Shanghai');
        $configData = Config::getInstance()->getConf('MYSQL');
        $config = new \EasySwoole\Mysqli\Config($configData);
        $poolConf = \EasySwoole\MysqliPool\Mysql::getInstance()->register('mysql', $config);
        $poolConf->setMaxObjectNum(10);
    }
    public static function mainServerCreate(EventRegister $register)
    {
        // TODO: Implement mainServerCreate() method.
    }
    public static function onRequest(Request $request, Response $response): bool
    {
        // TODO: Implement onRequest() method.
        return true;
    }
    public static function afterRequest(Request $request, Response $response): void
    {
        // TODO: Implement afterAction() method.
    }
}
