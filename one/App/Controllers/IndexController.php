<?php

namespace App\Controllers;

use App\Model\User;
use One\Http\Controller;
use Swoole\Coroutine;

class IndexController extends Controller
{

    public function index()
    {
        return 'hello world';
    }

    public function create()
    {
        $id =  User::insert([
            'name' => 'one',
            'email' => 'one',
            'age' => 33
        ]);

        // 模拟业务逻辑处理数据 或者 调用其他服务
        Coroutine::sleep(0.01);

        return $id;
    }

    public function data(...$args)
    {
        return $this->json($args);
    }
}




