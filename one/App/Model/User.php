<?php

namespace App\Model;

use One\Database\Mysql\Model;

class User extends Model
{
    CONST TABLE = 'users';

    protected $_cache_time = 0;

}