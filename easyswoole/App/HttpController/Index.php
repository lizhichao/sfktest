<?php

namespace App\HttpController;

use EasySwoole\Http\AbstractInterface\Controller;
use Swoole\Coroutine;

class Index extends Controller
{

    public function index()
    {
        $this->response()->write('hello world');
    }

    public function create()
    {
        $db = \EasySwoole\MysqliPool\Mysql::getInstance()->pool('mysql')::defer();
        $id = $db->insert('users',[
            'name' => 'e11s',
            'email' => 'esm',
            'age' => 123
        ]);
        // 模拟业务逻辑处理数据 或者 调用其他服务
        Coroutine::sleep(0.01);
        $this->response()->write($id);
    }
}
