<?php

namespace Core;

class Autoload
{
    const CONTROLLERS_PATH = SITE_ROOT . '/controller/';

    const MODELS_PATH = SITE_ROOT . '/model/';

    const CORE_CLASSES = CORE_ROOT . 'app/';

    public static function loadSystemTools()
    {
        require_once CORE_ROOT . 'Debug/Debugger.php';
        App\Debug\Debugger::run();
    }

    public static function load()
    {
        self::loadCoreClasses();
        self::loadControllers();
        self::loadModels();
    }

    private static function loadCoreClasses()
    {
        foreach (glob(self::CORE_CLASSES . '*', GLOB_ONLYDIR) as $dir) {
            foreach (glob($dir . '/*.php') as $class) {
                require_once $class;
            }
        }
    }

    private static function loadControllers()
    {
        foreach (glob(self::CONTROLLERS_PATH . '*', GLOB_ONLYDIR) as $controllerDir) {
            foreach (glob($controllerDir . '/*.php') as $action) {
                include_once $action;
            }
        }
    }

    private static function loadModels()
    {
        foreach (glob(self::MODELS_PATH . '*.php') as $model) {
            include_once $model;
        }
    }
}
