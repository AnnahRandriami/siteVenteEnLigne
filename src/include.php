<?php 
//creation de constante utiliser pour le lien des dossier
define("SRC" ,  dirname(__FILE__));
define("ROOT" ,  dirname(SRC));
define("SP" ,  DIRECTORY_SEPARATOR);
define("CONFIG", ROOT.SP."config");
define("VIEWS", ROOT.SP."views");
define("MODEL", ROOT.SP."model");
define("BASE_URL", dirname($_SERVER['REQUEST_URI']));

// liaison avec config et datalayer
require CONFIG.SP."config.php";
require MODEL.SP."DataLayer.class.php";

$model = new DataLayer();
$category = $model->getCategory();


/* affiche sur l'ecran le chemin 
print_r(array(VIEWS, MODEL)); exit; */

//liason avec functions.php
require "functions.php";


?>