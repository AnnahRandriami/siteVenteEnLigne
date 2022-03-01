<?php 
class DataLayer{
    private $connexion; 
    //test si la connexion avec la database de mysql est fait
 function __construct() {
      try {
          $this->connexion = new PDO("mysql:host=".HOST.";dbname=".DB_NAME,DB_USER,DB_PASSWORD);
         // echo "connexion à la base de donnée reussi";
  //définit l'erreur si pas de connexion
      } catch (PDOException $th ) {
         echo $th->getMessage();
      }
    }

function createCustomers ($sexe, $firstname, $lastname, $phone, $passwords, $pseudo, $email){
    //requete insertion dans table customers de la base de donnée
   $sql = "INSERT INTO `customers`( sexe, firstname, lastname, phone, passwords, pseudo, email) VALUES 
    ( :sexe, :firstname, :lastname, :phone, :passwords, :pseudo, :email)";
    try {
        //test si requete fait
        $result = $this->connexion->prepare($sql);
      $var = $result -> execute(array(
          ':sexe' => $sexe,
          ':firstname' => $firstname,
          ':lastname' => $lastname,
          ':phone' => $phone,
            ':pseudo' => $pseudo,
            ':email' => $email,
            ':passwords' => sha1($passwords)
        ));
        if($var){
            return TRUE;
        }else{
            return FALSE;
        }
    } catch (PDOException $th) {
       return NULL; 
    }

}

function login($email,$passwords){
     $sql = "SELECT * FROM customers WHERE email = :email";  

     try {
         //code...
         $result = $this->connexion->prepare($sql);
         $result->execute(array(':email' => $email));
         $data = $result->fetch(PDO::FETCH_ASSOC);
         if($data && ($data['passwords'] == sha1($passwords))){
            //enleve le mot de passe dans print_r
            unset($data['passwords']);
            return $data;
         }else{
              return FALSE;
         }
     } catch (PDOException $th) {
        return NULL;
     }
     
}

function createOrders($idcustomers, $idproduct, $quantity, $price){
    $sql = "INSERT INTO `orders`(idcustomers, idproduct, quantity, price) VALUES 
    (:idcustomers , :idproduct, :quantity, :price)";

    try {
        //code...
        $result  = $this->connexion->prepare($sql);
        $var = $result->execute (array(
        ':idcustomers' =>$idcustomers,
        ':idproduct' => $idproduct,
        ':quantity' => $quantity,
        ':price' => $price
    ));
    if($var){
        return TRUE;
    }else{
        return FALSE;
    }
    } catch (PDOException $th) {
        //throw $th;
    }

}

//uptdate
function uptadeInfoCustomers($newInfo){
    $sql = "UPDATE `customers` SET "; 
    try {
       foreach($newInfo as $key => $value){
          $sql .= " $key = '$value' ,";
       }
       $sql = substr($sql,0,-1);
       $sql .= " WHERE idcustomers = :idcustomers";
       $result = $this->connexion->prepare($sql);
      $var = $result->execute(array('idcustomers'=>$newInfo['idcustomers']));
      if($var){
        return TRUE;
    }else{
        return FALSE;
    }
   } catch (\Throwable $th) {
       //throw $th;
   } //requette uptabe table cust
}
function getCategory(){
    $sql = "SELECT * FROM category";

    try {
        $result = $this->connexion->prepare($sql);
        $var = $result->execute();
        //recup tout les elements
        $data = $result->fetchAll(PDO::FETCH_ASSOC);
        if($data){
            return $data;
        }else{
            return FALSE;
        }
    } catch (PDOException $th) {
        //throw $th;
    }

}

function getProduct($limit=NULL , $category=NULL){
    $sql = "SELECT * FROM product ";
    try {
        if(!is_null($category)){
            $sql .= 'WHERE idCategory = ' .$category;
       }
        if(!is_null($limit)){
             $sql .= ' LIMIT ' .$limit;
        }
        //print_r($sql); exit();
        $result = $this->connexion->prepare($sql);
        $var = $result->execute();
        //recup tout les elements
        $data = $result->fetchAll(PDO::FETCH_ASSOC);
        if($data){
            return $data;
        }else{
            return FALSE;
        }
    } catch (PDOException $th) {
        //throw $th;
    }
}


}
  
?>