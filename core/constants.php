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
define('TEST', ROOT . DS . 'test');
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
define('DATA', SRC . DS . 'data');

/** - IMAGES */
define('IMAGES', DATA . DS . 'img');

/** - FRAMEWORK */
define('FRAMEWORK', SRC . DS . 'framework');

/** - TEST */
define('TESTHELP', TEST . DS . 'Helpers');

/** - VIEW */
define('ADMIN', VIEWS . DS . 'admin');
define('CATEG', VIEWS . DS . 'categorie');
define('ARTICLE', VIEWS . DS . 'article');
define('LAYOUTS', VIEWS . DS . 'layouts');
define('USER', VIEWS . DS . 'user');

require CORE . DS . 'includes.php';