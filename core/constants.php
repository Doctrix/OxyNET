<?php

/** / */
define('ROOT', dirname(__DIR__));
define('DEBUG_TIME', microtime(true));
define('DS', DIRECTORY_SEPARATOR);
define('BASE_URL', '/');
define('SITE_URL', BASE_URL . DS . $_SERVER['SCRIPT_NAME']);

/** ROOT */
define('CONTROLLER', ROOT . DS . 'controller');
define('CORE', ROOT . DS . 'core');
define('MODEL', ROOT . DS . 'model');
define('PUBLI', ROOT . DS . 'public');
define('SRC', ROOT . DS . 'src');
define('TESTS', ROOT . DS . 'tests');
define('VENDOR', ROOT . DS . 'vendor');
define('VIEWS', ROOT . DS . 'view');

/** - ELEMENT */
define('ELEM', CONTROLLER . DS . 'element');
define('ELEM_COMM', ELEM . DS . 'commentaire');
define('ELEM_CONN', ELEM . DS . 'connexion');

/** - FONCTION */
define('FONCTION', CONTROLLER . DS . 'fonction');

/** - LIBRARY */
define('LIB', CORE . DS . 'lib');

/** - MODEL */
define('HELPER', MODEL . DS . 'Helpers');
define('HTML', MODEL . DS . 'HTML');
define('MOD', MODEL . DS . 'Model');
define('SECURITY', MODEL . DS . 'Security');
define('SERVER', MODEL . DS . 'Server');
define('TABLE', MODEL . DS . 'Table');
define('VALIDATOR', MODEL . DS . 'Validators');
define('WIDGET', MODEL . DS . 'Widgets');

/** - INC */
define('INC', PUBLI . DS . 'inc');

/** - DATA */
define('DATA', SRC . DS . 'Data');

/** - IMAGES */
define('IMAGES', DATA . DS . 'img');

/** - FRAMEWORK */
define('FRAMEWORK', SRC . DS . 'Framework');

define('ROUTER', FRAMEWORK . DS . 'Router');

/** - TEST */
define('TESTHELP', TESTS . DS . 'Helpers');

/** - VIEW */
define('ADMIN', VIEWS . DS . 'admin');
define('AUTH', VIEWS . DS . 'auth');
define('CATEGORIE', VIEWS . DS . 'categorie');
define('LAYOUTS', VIEWS . DS . 'layouts');
define('POST', VIEWS . DS . 'post');
define('MSG', VIEWS . DS . 'messagerie');
define('USER', VIEWS . DS . 'user');

require CORE . DS . 'includes.php';