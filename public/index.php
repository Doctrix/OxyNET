<?php
require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'core/config/constants.php';

spl_autoload_register('autoload');
function autoload($class)
{
    require PLUGIN . str_replace('\\', DS, $class) . '.php';
}

require_once VENDOR . 'autoload.php';
require_once CONFIG . 'routes.php';
