<?php

if(!empty($_POST)){
    header('Content-Type: application/json');

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

                    $errors = [$validator->get_nom_error(), $validator->get_prenom_error(),$validator->get_email_error(), $validator->get_password_error(), $validator->get_poste_error()];

                    echo json_encode($errors);
            }
           
       }catch(Exception $e){
           die ("Error: " . $e->getMessage());
       } 

} 


    


