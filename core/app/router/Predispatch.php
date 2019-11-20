<?php

namespace Core\App\Router;

use Core\App\Router\Dispatch;

class Predispatch
{
    private $dispatcher;

    public function __construct(Dispatch $dispatch)
    {
        $this->dispatcher = $dispatch;
    }

    public function execute(array $routing)
    {
        $this->dispatcher->execute($routing);
    }
}
