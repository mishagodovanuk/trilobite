<?php

namespace Core\App\Controller;

use Core\App\View\View;

/**
 * Class AbstractAction
 *
 * @package Core\App\Controller
 */
abstract class AbstractAction
{
    /**
     * View instance.
     *
     * @var \Core\App\View\View
     */
    private $view;

    /**
     * AbstractAction constructor.
     *
     * @param $data
     */
    public function __construct($data)
    {
        $this->view = new View($data);
    }

    /**
     * Abstract main action function.
     *
     * @return \Core\App\View\View
     */
    abstract public function execute();

    /**
     * Proxy render function.
     *
     * @param            $content
     * @param array|null $data
     *
     * @return \Core\App\View\View
     */
    protected function render($content, array $data = null)
    {
        return $this->getView()->render($content, $data);
    }

    /**
     * Get view instance.
     *
     * @return \Core\App\View\View
     */
    protected function getView()
    {
        return $this->view;
    }
}
