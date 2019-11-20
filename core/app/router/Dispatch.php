<?php

namespace Core\App\Router;

class Dispatch
{
    private $routing;

    public function __construct()
    {
    }

    public function execute(array $routing)
    {
        $this->routing = $routing;


    }

    private function dispatch()
    {
        if (is_dir(CONTROLLERS_ROOT . $this->routing['controller'])) {
            //if (class_exists())


        } else {
            die("Class {$this->routing['controller']} doesnt exist");
        }
    }
}
