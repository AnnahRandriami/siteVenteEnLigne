<?php 
// message pour chaque page selectionné pas l'utilisateur
function displayAcceuil(){
    return '<h1> Bienvenue sur la page d\'acceuil </h1>';
}

function displayContact(){
    global $model; 
    $result = '<h1> Bienvenue sur le page de contact </h1>';
  $dataProduct = $model->getProduct();
  print_r()




    return = $result;
}

?>