<?php

namespace App\Controllers;

use App\Model\User;
use One\Http\Controller;

class IndexController extends Controller
{

    public function index()
    {
        return 'hello world';
    }

    public function create()
    {
        return User::insert([
            'name' => 'one',
            'email' => 'one',
            'age' => 33
        ]);
    }

    public function data(...$args)
    {
        return $this->json($args);
    }
}




