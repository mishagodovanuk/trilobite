<?php

namespace Core\App\View;

/**
 * Class View
 *
 * @package Core\App\View
 */
class View
{
    /**
     * Page title.
     *
     * @var string
     */
    private $title;

    /**
     * Page template.
     *
     * @var string
     */
    private $template;

    /**
     * Page content.
     *
     * @var string
     */
    private $content;

    /**
     * Page data.
     *
     * @var array
     */
    private $data;

    /**
     * Routing array.
     *
     * @var array
     */
    private $routing;

    /**
     * View constructor.
     *
     * @param $routing
     */
    public function __construct($routing)
    {
        $this->routing = $routing;
        $this->setDefaultSkeleton();
    }

    /**
     * Set title.
     *
     * @param null $title
     */
    public function setTitle($title = null)
    {
        $this->title = $title;
    }

    /**
     * Get title.
     *
     * @return mixed
     */
    public function getTitle()
    {
        if ($this->title === null) {
            $this->title = $this->routing['action'];
        }

        return $this->title;
    }

    /**
     * Set template.
     *
     * @param null $template
     */
    public function setTemplate($template = null)
    {
        $this->template = $template;
    }

    /**
     * Get template.
     *
     * @return mixed
     */
    public function getTemplate()
    {
        return $this->template;
    }

    /**
     * Set content.
     *
     * @param $content
     */
    private function setContent($content)
    {
        $this->content = $content;
    }

    /**
     * Get content.
     *
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set data.
     *
     * @param $data
     */
    private function setData($data)
    {
        $this->data = $data;
    }

    /**
     * Get data.
     *
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * Render.
     *
     * @param      $content
     * @param null $data
     *
     * @return $this
     */
    public function render($content, $data = null)
    {
        $this->content = $content;
        $this->data = $data;

        return $this;
    }

    /**
     * Set default data.
     */
    private function setDefaultSkeleton()
    {
        $this->setTitle($this->routing['action']);
        $this->setTemplate('Main');
        //$this->setTemplate($this->routing['controller']);
    }
}
