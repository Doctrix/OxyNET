<?php
define('DEBUG_TIME',microtime(true));
/* BASE_URL */
define('SITE_URL', '//serveur.oxygames.fr');
define('BASE_URL',dirname(dirname($_SERVER['SCRIPT_NAME'])));
define('ROOT',dirname(__DIR__));
define('DS',DIRECTORY_SEPARATOR);
/* ROOT */
define('CORE',ROOT.DS.'core');
define('PUB',ROOT.DS.'public');
define('SRC',ROOT.DS.'src');
define('VENDOR',ROOT.DS.'vendor');
define('VIEWS',ROOT.DS.'views');
/* - CORE */
define('LIB',CORE.DS.'lib');
/* - SRC */
define('CLAS',SRC.DS.'class');
define('DATA',SRC.DS.'data');
define('FONC',SRC.DS.'fonctions');
define('INC',SRC.DS.'inc');
define('ELEM',SRC.DS.'elements');
/* - VIEWS */
define('ADMIN',VIEWS.DS.'admin');
define('CAT',VIEWS.DS.'categorie');
define('POST',VIEWS.DS.'article');
define('STRUC',VIEWS.DS.'structure');
/* -- Sous dossier SRC/DATA */
define('IMAGES',DATA.DS.'img');
/* -- Sous dossier SRC/ELEM */
define('ELEM_CONN',ELEM.DS.'connexion');
define('ELEM_COMM',ELEM.DS.'commentaire');
require CORE.DS.'includes.php';