<?php 
class DataLayer{
    private $connexion; 
    //test si la connexion avec la database de mysql est fait
 function __construct() {
      try {
          $this->connexion = new PDO("mysql:host=".HOST.";dbname=".DB_NAME,DB_USER,DB_PASSWORD);
          echo "connexion à la base de donnée reussi";
  //définit l'erreur si pas de connexion
      } catch (PDOException $th ) {
         echo $th->getMessage();
      }
    }
    
}

?>