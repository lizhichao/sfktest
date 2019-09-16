<?php

namespace ImiApp\ApiServer\Controller;

use Imi\Controller\HttpController;
use Imi\Db\Db;
use Imi\Server\View\Annotation\View;
use Imi\Server\Route\Annotation\Route;
use Imi\Server\Route\Annotation\Action;
use Imi\Server\Route\Annotation\Controller;
use Swoole\Coroutine;

/**
 * @Controller("/")
 * @View(baseDir="index/")
 */
class IndexController extends HttpController
{
    /**
     * @Action
     * @Route("/")
     *
     * @return void
     */
    public function index()
    {
        return 'hello world';
    }

    /**
     * @Action
     * @Route("/create")
     * @return void
     */

    public function create()
    {
        $result = Db::query()->table('users')->insert([
            'email' => 'ess',
            'name'  => 'we',
            'age'   => 35
        ]);
        // 模拟业务逻辑处理数据 或者 调用其他服务
        Coroutine::sleep(0.01);

        return $result->getLastInsertId();
    }

    /**
     * @Action
     * @return void
     */
    public function api($time)
    {
        return [
            'hello' => 'imi',
            'time'  => date('Y-m-d H:i:s', time()),
        ];
    }

}
