<?php

namespace Core\App\Controller;

use Core\App\Controller\Http;

/**
 * Class Request
 *
 * @package Core\App\Controller
 */
class Request extends Http
{
    /**
     * Is Request Post.
     *
     * @return bool
     */
    public function requestIsPost()
    {
        $result = false;
        if (!empty($_POST)) {
            $result = true;
        }
        return $result;
    }

    /**
     * Is Request is Get.
     *
     * @return bool
     */
    public function requestIsGet()
    {
        $result = false;
        if (!empty($_GET)) {
            $result = true;
        }
        return $result;
    }

    /**
     * Get all request data.
     *
     * @return mixed
     */
    public function getAll()
    {
        return $_REQUEST;
    }

    /**
     * Get Post request.
     *
     * @param mixed ...$args
     *
     * @return array|bool
     */
    protected function getPostRequest(...$args)
    {
        $postData = [];
        foreach ($args as $arg) {
            $postData[] = $_POST[$arg];
        }
        if (empty($postData)) {
            return false;
        }
        return $postData;
    }

    /**
     * Get $_GET request.
     *
     * @param mixed ...$args
     *
     * @return array|bool
     */
    protected function getParams(...$args)
    {
        $result = [];
        foreach ($args as $arg) {
            $result[] = $_GET[$arg];
        }
        if (empty($result)) {
            return false;
        }
        return $result;
    }
}
