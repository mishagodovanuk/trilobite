<?php

namespace Core\App\Router;

use Core\App\Router\Predispatch;
use Core\App\Router\Dispatch;

/**
 * Class Router
 *
 * @package Core\App\Router
 */
class Router
{
    /**
     * Exploded ulr.
     *
     * @var array
     */
    private $explodedUrl;

    /**
     * Exploded array.
     *
     * @var array
     */
    private $explodedArray;

    /**
     *  Run.
     *
     * function run non static routing.
     *
     * @return void
     */
    public static function run()
    {
        (new self)->routingStart();
    }

    /**
     * Run routing.
     *
     * @return void
     */
    private function routingStart()
    {
        $this->setPathArray();

        $this->runDispatcher();
    }

    /**
     * Set Controller and action.
     *
     * @return void
     */
    private function setPathArray()
    {
        $this->explodedUrl['controller'] = $this->getUrlController();
        $this->explodedUrl['action'] = $this->getUrlAction();
    }

    /**
     * Explode url.
     *
     * @return array
     */
    private function explodeUrl()
    {
        if ($this->explodedArray === null) {
            $this->explodedArray = explode('/', $_SERVER['REQUEST_URI']);
        }

        return $this->explodedArray;
    }

    /**
     * Get Controller.
     *
     * @return string
     */
    private function getUrlController()
    {
        $result = 'main';  //default result
        $explodedArray = $this->explodeUrl();

        if (array_key_exists(1, $explodedArray) && !empty($explodedArray[1])
            && !strstr($explodedArray[1], '?') && !strstr($explodedArray[1], 'index')) {
            $result = $explodedArray[1];
        }

        return (string)$result;
    }

    /**
     * Get Action.
     *
     * @return string
     */
    private function getUrlAction()
    {
        $result = 'index';
        $explodedArray = $this->explodeUrl();

        if (array_key_exists(2, $explodedArray) && !empty($explodedArray[2]) && !strstr($explodedArray[2], '?')) {
            $result = $explodedArray[2];
        }

        if (array_key_exists(2, $explodedArray) && strstr($explodedArray[2], '?')) {
            $action = explode('?', $explodedArray[2]);
            $result = $action[0];
        }

        return (string)$result;
    }

    private function runDispatcher()
    {
        $dispatcher = new Predispatch(new Dispatch());
        $dispatcher->execute($this->explodedUrl);
    }
}
