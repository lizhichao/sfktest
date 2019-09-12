<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://doc.hyperf.io
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf-cloud/hyperf/blob/master/LICENSE
 */

namespace App\Controller;

use App\Model\Users;

class IndexController extends Controller
{
    public function index()
    {
        return 'hello world';
    }

    public function create()
    {
        $res = Users::create([
            'name' => 'hf',
            'email' => 'hfe',
            'age' => 11
        ]);
        return $res['id'];
    }
}
