<?php
/** / */
define('ROOT', dirname(__DIR__,2));
define('DEBUG_TIME', microtime(true));
define('DS', DIRECTORY_SEPARATOR);
define('BASE_URL', '/');
define('SITE_URL', BASE_URL . DS . $_SERVER['SCRIPT_NAME']);

/** ROOT */
define('CORE', ROOT . DS . 'core');
define('PUB', ROOT . DS . 'public');
define('SRC', ROOT . DS . 'app');
define('TESTS', ROOT . DS . 'tests');
define('VENDOR', ROOT . DS . 'vendor');
define('VIEWS', ROOT . DS . 'view');

/** - LIBRARY */
define('CONFIG', CORE . DS . 'config');

/** - INC */
define('INC', PUB . DS . 'inc');
/** - DATA */
define('DATA', PUB . DS . 'data');
/** - IMAGES */
define('IMAGES', INC . DS . 'img');

/** - FRAMEWORK */
define('CONTROLLER', SRC . DS . 'controller');
define('ELEM', SRC . DS . 'element');
define('HELPER', SRC . DS . 'helper');
define('HTML', SRC . DS . 'HTML');
define('MODEL', SRC . DS . 'Mmdel');
define('SECURITY', SRC . DS . 'security');
define('SERVER', SRC . DS . 'server');
define('TABLE', SRC . DS . 'table');
define('VALIDATOR', SRC . DS . 'validator');
define('WIDGET', SRC . DS . 'widgets');

/** - ELEMENT */
define('ELEM_COMM', ELEM . DS . 'commentaire');
define('ELEM_CONN', ELEM . DS . 'connexion');

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
