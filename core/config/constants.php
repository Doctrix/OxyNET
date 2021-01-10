<?php
/** / */
define('ROOT', dirname(__DIR__, 2));
define('DEBUG_TIME', microtime(true));
define('DS', DIRECTORY_SEPARATOR);
define('BASE_URL', '/');
define('SITE_URL', BASE_URL . DS . $_SERVER['SCRIPT_NAME']);

/** ROOT */
define('CORE', ROOT . DS . 'core' . DS);
define('PUB', ROOT . DS . 'public' . DS);
define('SRC', ROOT . DS . 'app' . DS);
define('TESTS', ROOT . DS . 'tests' . DS);
define('VENDOR', ROOT . DS . 'vendor' . DS);
define('VIEWS', ROOT . DS . 'view' . DS);

/** - CONFIG */
define('CONFIG', CORE . DS . 'config' . DS);

/** - PLUGINS */
define('PLUGIN', CORE . DS . 'plugins' . DS);

/** - INC */
define('INC', PUB . DS . 'inc' . DS);

/** - DATA */
define('DATA', PUB . DS . 'data' . DS);

/** - IMAGES */
define('IMAGES', INC . DS . 'img' . DS);

/** - FRAMEWORK */
define('CONTROLLER', SRC . DS . 'controller' . DS);
define('ELEM', SRC . DS . 'element' . DS);
define('HELPER', SRC . DS . 'helper' . DS);
define('HTML', SRC . DS . 'HTML' . DS);
define('MODEL', SRC . DS . 'Mmdel' . DS);
define('SECURITY', SRC . DS . 'security' . DS);
define('SERVER', SRC . DS . 'server' . DS);
define('TABLE', SRC . DS . 'table' . DS);
define('VALIDATOR', SRC . DS . 'validator' . DS);
define('WIDGET', SRC . DS . 'widgets' . DS);

/** - TEST */
define('TESTHELP', TESTS . DS . 'Helpers' . DS);

/** - VIEW */
define('ADMIN', VIEWS . DS . 'admin' . DS);
define('AUTH', VIEWS . DS . 'auth' . DS);
define('BLOG', VIEWS . DS . 'blog' . DS);
define('CATEGORIE', VIEWS . DS . 'category' . DS);
define('LAYOUTS', VIEWS . DS . 'layouts' . DS);
define('MSG', VIEWS . DS . 'messagerie' . DS);
define('POST', VIEWS . DS . 'post' . DS);
define('USER', VIEWS . DS . 'user' . DS);

require_once CONFIG . DS . 'includes.php';
