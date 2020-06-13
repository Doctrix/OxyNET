<?php
define('ROOT', dirname(__DIR__));
define('DEBUG_TIME', microtime(true));
define('DS', DIRECTORY_SEPARATOR);
define('BASE_URL', '/');
define('SITE_URL', BASE_URL . DS . $_SERVER['SCRIPT_NAME']);
/* ROOT */
define('CORE', ROOT . DS . 'core');
define('PUB', ROOT . DS . 'public');
define('SRC', ROOT . DS . 'src');
define('VENDOR', ROOT . DS . 'vendor');
define('VIEWS', ROOT . DS . 'views');
/* - CORE */
define('LIB', CORE . DS . 'lib');
/* - SRC */
define('CLAS', SRC . DS . 'class');
define('DATA', SRC . DS . 'data');
define('FONC', SRC . DS . 'fonctions');
define('INC', SRC . DS . 'inc');
define('ELEM', SRC . DS . 'elements');
/* - VIEWS */
define('ADMIN', VIEWS . DS . 'admin');
define('CATEG', VIEWS . DS . 'categorie');
define('ARTICLE', VIEWS . DS . 'article');
define('LAYOUTS', VIEWS . DS . 'layouts');
define('USER', VIEWS . DS . 'user');
/* -- Sous dossier SRC/DATA */
define('IMAGES', DATA . DS . 'img');
/* -- Sous dossier SRC/ELEM */
define('ELEM_CONN', ELEM . DS . 'connexion');
define('ELEM_COMM', ELEM . DS . 'commentaire');

require CORE . DS . 'includes.php';
