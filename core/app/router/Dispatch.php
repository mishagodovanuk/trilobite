<?php

namespace Core\App\Router;

/**
 * Class Dispatch
 *
 * @package Core\App\Router
 */
class Dispatch
{
    /**
     * Routing array.
     *
     * @var
     */
    private $routing;

    /**
     * Dispatch constructor.
     */
    public function __construct()
    {
    }

    /**
     * Execute function.
     *
     * @param array $routing
     */
    public function execute(array $routing)
    {
        $this->routing = $routing;
        $this->dispatch();

    }

    /**
     * Dispatch.
     */
    private function dispatch()
    {
        $action = '\User\Controller\\' . $this->routing['controller'] . '\\' . $this->routing['action'];

        if (is_dir(CONTROLLERS_ROOT . $this->routing['controller'])) {
            if (class_exists($action)) {
                $this->runDispatch($action, $this->routing);
            } else {
                die("Action class {$action} in {$this->routing['action']} doest exist");
            }
        } else {
            die("Class {$this->routing['controller']} doesnt exist");
        }
    }

    /**
     * Run dispatch, run current action.
     *
     * All pre dispatch ivents will be call here.
     *
     * @param $action
     * @param $routing
     */
    private function runDispatch($action, $routing)
    {
        $startAction = new $action($routing);
        print_r($startAction->execute());
    }
}
