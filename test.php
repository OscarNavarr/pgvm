<?php

//este test me da todos los usuarios de la base de datos
    include_once "./class/user.php";


    if(!$db){
        die("You must specify a database");
        exit();
    }else{
        try{
            //Create new instance of User object passing db connection to database
            $get_users = new User($db);
        
            $allUsers = $get_users->getAlltUser();
        
            var_dump($allUsers);
        
        }catch(Exception $e){
            echo "Error: " . $e->getMessage();
        }
    }
    
    


?>