<?php
require_once 'core/Library/constants.php';
require_once 'core/Autoload.php';

Core\Autoload::loadSystemTools();
Core\Autoload::load();

Core\App\Router\Router::run();


die('<br> die method here');