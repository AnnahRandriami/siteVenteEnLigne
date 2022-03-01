<?php 
// message pour chaque page selectionné pas l'utilisateur
function displayAcceuil(){
    return '<h1> Bienvenue sur la page d\'acceuil </h1>';
}

function displayContact(){
    return '<h1> Bienvenue sur la page de contact </h1>';
}

function displayProduit(){
    global $model; 
    $dataProduct = $model->getProduct();
    //Affichage product avec photo
    $result = '<h1> Bienvenue sur la page Produit </h1>';
foreach ($dataProduct as $key => $value) {
    $result .= '<div class="card" style="width: 18rem; display:inline-block;">
      <img src="'.BASE_URL.SP."image".SP."produit".SP.$value["image"].'" class="card-img-top" alt="...">
       <div class="card-body">
       <h5 class="card-title">'.$value["name"].'</h5>
       <p class="card-text">'.$value["description"].'</p>
       <a href="#" class="btn btn-primary">Acheter</a>
       <a href="#" class="btn btn-success">Details</a>
        </div>
        </div>'; 
     } 
     return $result;
}

function displayCategory(){
    global $model;
    global $url;
    global $category;
   // print_r($url); exit();
    $result =  '<h1> Produit de la category '.$category[$url[1]-1] ["name"].' </h1>';
    $dataProduct = $model->getProduct(null,$url[1]);
    foreach ($dataProduct as $key => $value) {
        $result .= '<div class="card" style="width: 18rem; display:inline-block;">
          <img src="'.BASE_URL.SP."image".SP."produit".SP.$value["image"].'" class="card-img-top" alt="...">
           <div class="card-body">
           <h5 class="card-title">'.$value["name"].'</h5>
           <p class="card-text">'.$value["description"].'</p>
           <a href="#" class="btn btn-primary">Acheter</a>
           <a href="#" class="btn btn-success">Details</a>
            </div>
            </div>'; 
         } 
    return $result;
}
?>