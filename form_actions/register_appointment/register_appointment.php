<?php


if (!empty($_POST)){

    header('Content-Type: application/json');


    try{
        //IMPORT THE USER CLASS
        require_once "../../class/user.php";

        //IMPORT THE MEDICAL APPOINTMENT CLASS
        include_once "../../class/medical_appointment.php";

        //IMPORT THE CONECTION TO DATABASE
        require_once "../../connection/db_connect.php";
        
        
        
        //CREATE NEW INSTANCE OF MEDICAL_APPOINTMENT CLASS 
        $create_medical_appointment = new Medical_Appointment($db);

        //CREATE NEW INSTANCE OF USER CLASS 
        $create_user = new User($db);

        

        
        $user_exist = null;
            
        //CHECK IF THE EMAIL IS VALID 
        if(!empty($_POST["email"])){

            if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
                die (json_encode("L'e-mail n'a pas un format valide"));
            }else{
                //GET THE USER BY HIS EMAIL
                $user_exist = $create_user->getUserByEmail($_POST["email"]);
            }
    
            //CHECK IF USER EXISTS
            if($user_exist == null){
                die (json_encode("L'e-mail saisi n'est pas correct, veuillez réessayer d'écrire l'e-mail"));
            }else{
                
                // IF THE USER EXISTS AND $_POST["time "] IS NOT EMPTY THEN WE REGISTER THE MEDICAL APPOINTMENT WITH THE USER ID
                if(empty($_POST["time"])){
                    die(json_encode("Le champ pour insérer l'heure est vide, vous devez le remplir"));
                }else{
                    //CHECK IF THE MEDICAL APPOINTMENT EXIST 
                    $exist_appointment = $create_medical_appointment->get_all_medical_appointment_by_date_time_user_id($_POST["date"],$_POST["time"], $user_exist["id"]);

                    if(!$exist_appointment){
                        $create_medical_appointment->create_medical_appointment($_POST["date"],$_POST["time"], $user_exist["id"]);
                    }else{
                        die(json_encode("Vous avez déjà créé un rendez-vous médical pour cet employé le même jour et à la même heure"));
                    }
                    
                }
            }
        }else{
            die(json_encode("Le champ email est vide, vous devez le remplir"));
        }

    }catch(Exception $e){
        echo json_encode("Error: " . $e->getMessage());
    } 
}