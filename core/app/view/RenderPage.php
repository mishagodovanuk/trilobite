<?php

namespace Core\App\View;

/**
 * Class RenderPage
 *
 * @package Core\App\View
 */
class RenderPage
{
    /**
     * Page data.
     *
     * @var array
     */
    protected $data;

    /**
     * RenderPage constructor.
     *
     * @param $page
     * @param $data
     */
    public function __construct($page, $data)
    {
        $this->data = $data;

        require_once $page;
    }
}
