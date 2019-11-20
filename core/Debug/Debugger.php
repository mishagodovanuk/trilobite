<?php

namespace Core\App\Debug;

class Debugger
{
    public static function run()
    {
        ini_set('display_errors',1);
    }
}
