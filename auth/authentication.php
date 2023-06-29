<?php


    if(!empty($_POST)){
 
        //We check if the email and password were sent by the user
        if (isset($_POST['email'], $_POST['password']) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) && !empty($_POST['email']) && !empty($_POST['password'])){ 
            
            include_once "../class/user.php";
            require_once "../connection/db_connect.php";
            
            $user = new User($db); 
            
            //We get the user from the database by his email address
            $exist_email = $user->getUserByEmail($_POST['email']);
            
            //WE CHECK IF THE EMAIL DOES NOT EXIST IN THE DATABASE
            if(!$exist_email){
                die("L'utilisateur et/ou le mot de passe est incorrect ");
            }
                
            //WE CHECK IF THE PASSWORD IS CORRECT
            if(!password_verify($_POST["password"], $exist_email["password"])){
                die("L'utilisateur et/ou le mot de passe est incorrect ");
            }
            
            //WE OPEN THE SESSION
            session_start();

            //WE SAVE THE INFORMATIONS IN THE SESSION
            $_SESSION["user"] = [
                "id" => $exist_email["id"],
                "nom" => $exist_email["nom"],
                "prenom" => $exist_email["prenom"],
                "email" => $exist_email["email"],
                "poste" => $exist_email["poste"],
            ]; 

            
            //WE REDIRECT THE USER TO THE HOME PAGE
            header("Location: ../pages/home_page.php");

        }else{    
            // Could not get the data that should have been sent.
            exit('Please fill both the email and password fields!');
        }
    }

