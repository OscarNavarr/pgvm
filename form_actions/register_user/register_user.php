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

            //WE CHECK IF THE FORM IS OK
            if($validator->is_form_valid()){
                
                $create_user->insertUser($_POST["nom"], $_POST["prenom"], $_POST["password"], $_POST["email"], $_POST["poste"]);
            
            }else{

                //IF THE FORM IS NOT OK THEN WE SHOW THE ERRORS 
                $errors = array(
                    "nom_error" => $validator->get_nom_error(),
                    "prenom_error" => $validator->get_prenom_error(),
                    "email_error" => $validator->get_email_error(),
                    "password_error" => $validator->get_password_error(),
                    "poste_error" => $validator->get_poste_error(),
                );
                $erros_json = json_encode($errors);
                echo $erros_json;
            }
           
       }catch(Exception $e){
           die ("Error: " . $e->getMessage());
       } 

} 


    


