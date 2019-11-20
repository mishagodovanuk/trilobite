<?php

namespace Core\App\Router;

use Core\App\Router\Dispatch;

class Predispatch
{
    private $dispatcher;

    private $fullRouting;

    public function __construct(Dispatch $dispatch)
    {
        $this->dispatcher = $dispatch;
    }

    public function execute(array $routing)
    {
        $this->dispatcher->execute($this->setFileRouting($routing));
    }

    private function setFileRouting(array $routing)
    {
        if ($this->fullRouting === null) {
            $this->fullRouting['url_controller'] = $routing['controller'];
            $this->fullRouting['url_action'] = $routing['action'];
            $this->fullRouting['controller'] = ucfirst($routing['controller']);
            $this->fullRouting['action'] = ucfirst($routing['action']);
        }

        return $this->fullRouting;
    }
}
