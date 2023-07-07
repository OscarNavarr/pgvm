<?php

if(!empty($_POST)){
    header('Content-Type: application/json');

        try{

           //IMPORT THE USER CLASS
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
                
                if($_POST["poste"] === "employé"){

                    $create_user->insertUser($_POST["nom"], $_POST["prenom"], $_POST["password"], $_POST["email"], $_POST["poste"]);

                }else if($_POST["poste"] === "admin"){
                    $user_exist = $create_user->getUserByPoste("admin");

                    if(empty($user_exist) || $user_exist == null){
                        $create_user->insertUser($_POST["nom"], $_POST["prenom"], $_POST["password"], $_POST["email"], $_POST["poste"]);
                    }else{
                        die(json_encode("Il y a déjà un administrateur enregistré dans la base de données"));
                    }
                }else if($_POST["poste"] === "responsable"){
                    $user_exist = $create_user->getUserByPoste("responsable");

                    if(empty($user_exist) || $user_exist == null){
                        $create_user->insertUser($_POST["nom"], $_POST["prenom"], $_POST["password"], $_POST["email"], $_POST["poste"]);
                    }else{
                        die(json_encode("Il y a déjà un responsable enregistré dans la base de données"));
                    }
                }
            }else{

                //IF THE FORM IS NOT OK THEN WE SHOW THE ERRORS 

                    $errors = [$validator->get_nom_error(), $validator->get_prenom_error(),$validator->get_email_error(), $validator->get_password_error(), $validator->get_poste_error()];

                    echo json_encode($errors);
            }
           
       }catch(Exception $e){
           die ("Error: " . $e->getMessage());
       } 

} 


    


