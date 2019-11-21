<?php

namespace Core\App\Router;

use Core\App\Router\Dispatch;

/**
 * Class Predispatch
 *
 * @package Core\App\Router
 */
class Predispatch
{
    /**
     * Dispatcher.
     *
     * @var \Core\App\Router\Dispatch
     */
    private $dispatcher;

    /**
     * Routing.
     *
     * @var
     */
    private $fullRouting;

    /**
     * Predispatch constructor.
     *
     * @param \Core\App\Router\Dispatch $dispatch
     */
    public function __construct(Dispatch $dispatch)
    {
        $this->dispatcher = $dispatch;
    }

    /**
     * Execute function.
     *
     * @param array $routing
     */
    public function execute(array $routing)
    {
        $this->dispatcher->execute($this->setFileRouting($routing));
    }

    /**
     * Set routing file.
     *
     * @param array $routing
     *
     * @return null
     */
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
