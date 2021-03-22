<?php

namespace Aslam\Bni\Facades;

use Illuminate\Support\Facades\Facade;

class BniFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'BniAPI';
    }
}
