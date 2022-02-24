<?php 
//creation de constante utiliser pour le lien des dossier
define("SRC" ,  dirname(__FILE__));
define("ROOT" ,  dirname(SRC));
define("SP" ,  DIRECTORY_SEPARATOR);
define("CONFIG", ROOT.SP."config");
define("VIEWS", ROOT.SP."views");
define("MODEL", ROOT.SP."model");

// liaison avec config et datalayer
require CONFIG.SP."config.php";
require MODEL.SP."DataLayer.class.php";


//lancement functions 
$data = new DataLayer(); 
//ajout customers
//$var = $data -> createCustomers('sexe', 'firstname', 'lastname', 'phone', 'passwords','pseudo', 'email');
//test login

//$auten = $data -> login('salom@gmail.com','salom');
//print_r($var); exit();

//create order
//$var = $data -> createOrders( '13' , '1', '10', '1');
//print_r($var);

//uptade customers
//$var = $data-> uptadeInfoCustomers(array('idcustomers'=>13,'pseudo'=>'jmpn','firstname'=>'houONT'));

//select category
//$category = $data->getCategory();
//print_r($category); exit();


// select product
//$product = $data-> getProduct(1);
//var_dump($product); exit();



//liason avec functions.php*
require "functions.php";


?>