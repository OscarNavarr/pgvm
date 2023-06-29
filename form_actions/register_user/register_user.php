<?php



     if(!empty($_POST)){
        if(!empty($_POST["nom"]) && !empty($_POST["prenom"]) && !empty($_POST["email"]) && !empty($_POST["password"]) && !empty($_POST["poste"])){
             try{
                //IMPORT THE CLASS USER
                require_once "../../class/user.php";
                require_once "../../connection/db_connect.php";

                //Create new instance of User object 
                $create_user = new User($db);
                
                
                $create_user->insertUser($_POST["nom"], $_POST["prenom"], $_POST["password"], $_POST["email"], $_POST["poste"]);
                
                
            
            }catch(Exception $e){
                die ("Error: " . $e->getMessage());
            } 
        }else{
            die("Il y a un champ du formulaire qui est vide, veuillez remplir à nouveau les champs du formulaire et assurez-vous qu'ils sont tous complets");
        } 
    } 
    


