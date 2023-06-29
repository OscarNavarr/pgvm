<?php

if(!empty($_POST)){
   
        try{

           //IMPORT THE CLASS USER
           require_once "../../class/user.php";

           //IMPORT THE CLASS FORM VALIDATOR
           require_once "../../class/form_validator.php";

           //IMPORT THE CONECTION TO DATABASE
           require_once "../../connection/db_connect.php";

           //CREATE NEW INSTANCE OF USER CLASS 
           $create_user = new User($db);
           
           //CREATE NEW INSTANCE OF FORM_VALIDATOR CLASS
           $validator = new Form_Validator($_POST["nom"], $_POST["prenom"], $_POST["email"], $_POST["password"], $_POST["poste"]);

            var_dump($validator -> get_nom_error());

           $create_user->insertUser($_POST["nom"], $_POST["prenom"], $_POST["password"], $_POST["email"], $_POST["poste"]);
           
           
       
       }catch(Exception $e){
           die ("Error: " . $e->getMessage());
       } 

} 


    


