<?php

namespace Core\App\View;

use Core\App\View\RenderPage;

/**
 * Class RenderTemplate
 *
 * @package Core\App\View
 */
class RenderTemplate
{
    /**
     * Content path.
     *
     * @var string
     */
    private $contentPath;

    /**
     * Body.
     *
     * @var RenderPage
     */
    private $body;

    /**
     * Title.
     *
     * @var string
     */
    private $title;

    /**
     * Data.
     *
     * @var array
     */
    private $data;

    /**
     * RenderTemplate constructor.
     *
     * @param $template
     * @param $content
     * @param $pageData
     */
    public function __construct($template, $content, $pageData)
    {
        $this->title = $pageData['title'];
        $this->data = $pageData['data'];
        $this->contentPath = $content;

        require_once $template;
    }

    /**
     * Get body.
     */
    private function getBody()
    {
        if ($this->body === null) {
            $this->body = new RenderPage($this->contentPath, $this->data);
        }
    }
}
