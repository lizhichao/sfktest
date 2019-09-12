<?php declare(strict_types=1);


namespace App\Http\Controller;

use App\Model\Entity\User;
use Exception;
use Swoft\Http\Server\Annotation\Mapping\Controller;
use Swoft\Http\Server\Annotation\Mapping\RequestMapping;
use Swoft\Log\Helper\Log;
use Swoft\Redis\Redis;
use Swoft\Stdlib\Helper\JsonHelper;
use Swoft\Timer;

/**
 * Class TimerController
 *
 * @since 2.0
 *
 * @Controller(prefix="timer")
 */
class TimerController
{
    /**
     * @RequestMapping()
     *
     * @return array
     * @throws Exception
     */
    public function after(): array
    {
        Timer::after(3 * 1000, function (int $timerId) {
            $user = new User();
            $user->setAge(mt_rand(1, 100));
            $user->setUserDesc('desc');

            $user->save();
            $id = $user->getId();

            Redis::set("$id", $user->toArray());
            Log::info("用户ID=" . $id . " timerId=" . $timerId);
            sgo(function () use ($id) {
                $user = User::find($id)->toArray();
                Log::info(JsonHelper::encode($user));
                Redis::del("$id");
            });
        });

        return ['after'];
    }

    /**
     * @RequestMapping()
     *
     * @return array
     * @throws Exception
     */
    public function tick(): array
    {
        Timer::tick(3 * 1000, function (int $timerId) {
            $user = new User();
            $user->setAge(mt_rand(1, 100));
            $user->setUserDesc('desc');

            $user->save();
            $id = $user->getId();

            Redis::set("$id", $user->toArray());
            Log::info("用户ID=" . $id . " timerId=" . $timerId);
            sgo(function () use ($id) {
                $user = User::find($id)->toArray();
                Log::info(JsonHelper::encode($user));
                Redis::del("$id");
            });
        });

        return ['tick'];
    }
}