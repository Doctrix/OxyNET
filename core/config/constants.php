<?php
/** / */
define('ROOT', dirname(__DIR__,2));
define('DEBUG_TIME', microtime(true));
define('DS', DIRECTORY_SEPARATOR);
define('BASE_URL', '/');
define('SITE_URL', BASE_URL . DS . $_SERVER['SCRIPT_NAME']);

/** ROOT */
define('CONTROLLER', ROOT . DS . 'controller');
define('CORE', ROOT . DS . 'core');
define('PUB', ROOT . DS . 'public');
define('SRC', ROOT . DS . 'src');
define('TESTS', ROOT . DS . 'tests');
define('VENDOR', ROOT . DS . 'vendor');
define('VIEWS', ROOT . DS . 'view');

/** - FONCTION */
define('FONCTION', CONTROLLER . DS . 'fonction');
/** - ELEMENT */
define('ELEM', CONTROLLER . DS . 'element');
define('ELEM_COMM', ELEM . DS . 'commentaire');
define('ELEM_CONN', ELEM . DS . 'connexion');

/** - LIBRARY */
define('LIB', CORE . DS . 'lib');
define('CONFIG', CORE . DS . 'config');

/** - INC */
define('INC', PUB . DS . 'inc');
/** - DATA */
define('DATA', SRC . DS . 'Data');
/** - IMAGES */
define('IMAGES', DATA . DS . 'img');
/** - FRAMEWORK */
define('FRAMEWORK', SRC . DS . 'Framework');
define('ROUTER', FRAMEWORK . DS . 'Router');
define('HELPER', SRC . DS . 'Helpers');
define('HTML', SRC . DS . 'HTML');
define('MODEL', SRC . DS . 'Model');
define('SECURITY', SRC . DS . 'Security');
define('SERVER', SRC . DS . 'Server');
define('TABLE', SRC . DS . 'Table');
define('VALIDATOR', SRC . DS . 'Validators');
define('WIDGET', SRC . DS . 'Widgets');

/** - TEST */
define('TESTHELP', TESTS . DS . 'Helpers');

/** - VIEW */
define('ADMIN', VIEWS . DS . 'admin');
define('AUTH', VIEWS . DS . 'auth');
define('BLOG', VIEWS . DS . 'blog');
define('CATEGORIE', VIEWS . DS . 'category');
define('LAYOUTS', VIEWS . DS . 'layouts');
define('MSG', VIEWS . DS . 'messagerie');
define('POST', VIEWS . DS . 'post');
define('USER', VIEWS . DS . 'user');

require_once  CONFIG . DS . 'includes.php';
