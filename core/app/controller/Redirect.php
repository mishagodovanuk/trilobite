<?php

namespace Core\App\Controller;

class Redirect
{
    public static function pageNotFound()
    {
        header('Location:/core/Library/error_pages/404.php');
    }

    public static function goToMainPage($params = null)
    {
        $paremeters = static::genereteParams($params);
        header('Location:' . HOME_PAGE. $paremeters);
    }

    public static function goToPage($url, $params = null)
    {
        $parameters = static::genereteParams($params);
        header('Location:' . HOME_PAGE . $url . '/' . $parameters);
    }

    private static function genereteParams($params)
    {
        $result = '?';
        foreach ($params as $key => $value) {
            $result .= "{$key}={$value}&";
        }
        $result = rtrim($result, '&');

        return $result;
    }
}
