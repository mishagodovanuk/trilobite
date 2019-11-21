<?php

namespace Core\App\Controller;

class Redirect
{
    public static function pageNotFound()
    {
        header('Location:/core/Library/error_pages/404.php');
    }

    public static function goToMainPage()
    {
        header('Location:' . SERVER_ROOT);
    }
}
