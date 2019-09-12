<?php

namespace App\HttpController;

use EasySwoole\Component\Pool\PoolManager;
use EasySwoole\Http\AbstractInterface\Controller;

class Index extends Controller
{

    public function index()
    {
        $this->response()->write('hello world');
    }

    public function create()
    {
        $db = \EasySwoole\MysqliPool\Mysql::getInstance()->pool('mysql')::defer();
//        var_dump($db->rawQuery('select version()'));

//        $db = PoolManager::getInstance()->getPool(MysqlPool::class)->getObj();
//        $data = $db->get('test');
//        PoolManager::getInstance()->getPool(MysqlPool::class)->recycleObj($db);
//
//
//        $conf = new \EasySwoole\Mysqli\Config(\EasySwoole\EasySwoole\Config::getInstance()->getConf('MYSQL'));
//
//        $db = new \EasySwoole\Mysqli\Mysqli($conf);
        $id = $db->insert('users',[
            'name' => 'e11s',
            'email' => 'esm',
            'age' => 123
        ]);
        $this->response()->write($id);
    }
}
