<?php
    header('Content-Type: application/json');

   if(isset ($_POST["email"], $_POST["password"]) && empty($_POST["email"]) && empty($_POST["password"])){

       die (json_encode("Les champs email et mot de passe ne peuvent pas être vides, veuillez les remplir."));
    }

    // IF THERE IS AN EMAIL ADDRESS AND PASSWORD AND THEY ARE NOT NULL

    try {
        
        //IMPORT THE CONECTION TO DATABASE
        require_once "../../connection/db_connect.php";
        
        //IMPORT THE USER CLASS
        require_once "../../class/user.php";

        //CREATE NEW INSTANCE OF USER CLASS 
        $create_user = new User($db);

        //We get the user from the database by his email address
        $exist_email = $create_user -> getUserByEmail($_POST['email']);

        //WE CHECK IF THE EMAIL OR PASSWORD IS CORRECT
        if (!$exist_email || !password_verify($_POST["password"], $exist_email["password"])){
            die (json_encode("L'utilisateur et/ou le mot de passe est incorrect"));
        }


         //IF ALL IS OK, WE OPEN THE SESSION
        session_start();

        //WE SAVE THE INFORMATIONS IN THE SESSION
        $_SESSION["user"] = [
            "id" => $exist_email["id"],
            "nom" => $exist_email["nom"],
            "prenom" => $exist_email["prenom"],
            "email" => $exist_email["email"],
            "poste" => $exist_email["poste"],
        ]; 
        
        echo json_encode("All is ok!");
    } catch(Exception $e){
        die ("Error: " . $e->getMessage());
    } 
    
    
