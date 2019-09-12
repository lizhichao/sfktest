<?php declare(strict_types=1);

namespace App\Http\Controller;

use App\Model\Entity\User;
use ReflectionException;
use Swoft;
use Swoft\Bean\Exception\ContainerException;
use Swoft\Context\Context;
use Swoft\Http\Message\ContentType;
use Swoft\Http\Message\Response;
use Swoft\Http\Server\Annotation\Mapping\Controller;
use Swoft\Http\Server\Annotation\Mapping\RequestMapping;
use Swoft\View\Renderer;
use Throwable;

/**
 * Class HomeController
 * @Controller()
 */
class HomeController
{
    /**
     * @RequestMapping("/")
     * @throws Throwable
     */
    public function index(): Response
    {
        return Context::get()->getResponse()->withContent('hello world');
    }


    /**
     * @RequestMapping("/create")
     * @throws Throwable
     */
    public function create(): Response
    {
        $user = new User();
        $user->setAge(55);
        $user->setName('sw');
        $user->setEmail('em');
        $user->save();
        return Context::get()->getResponse()->withContent((string)$user->getId());
    }


    /**
     * @RequestMapping("/hello[/{name}]")
     * @param string $name
     *
     * @return Response
     * @throws ReflectionException
     * @throws ContainerException
     */
    public function hello(string $name): Response
    {
        return Context::mustGet()->getResponse()->withContent('Hello' . ($name === '' ? '' : ", {$name}"));
    }
}
