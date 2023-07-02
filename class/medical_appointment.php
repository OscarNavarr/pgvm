<?php
/**
 * 
 * THIS CLASS HAS THE OBJECTIVE OF STORING ALL THE FUNCTIONS NECESSARY TO MANAGE THE TABLE CALLED "rendez-vous" OF THE DATABASE
 * 
 * 
 */

class Medical_Appointment {

    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    /*
    * 
    *THIS FUNCTION ALLOW INSERT A NEW MEDICAL APPOINTMENT INTO THE DATABASE
    *
    */

    public function create_medical_appointment($appointment_date, $appointment_hour,$user_id){
        try{
            //CREATE THE SQL QUERY TO ADD A NEW MEDICAL APPOINTMENT
            $query = "INSERT INTO `rendez_vous` (`appointment_date`, `appointment_hour`, `user_id`) VALUES (:appointment_date, :appointment_hour, :user_id)";

            $statement = $this->db->prepare($query);

            // ASSIGN VALUES TO PARAMETERS
            $statement->bindParam(':appointment_date', $appointment_date);
            $statement->bindParam(':appointment_hour', $appointment_hour);
            $statement->bindParam(':user_id', $user_id);


            //EXECUTE THE QUERY
            $statement->execute();

            //IF ALL IS OK
            echo json_encode("Le nouveau rendez-vous a été ajouté avec succès");

        } catch (PDOException $e){
            echo json_encode("Erreur lors de l'insertion du rendez-vous: " . $e->getMessage());
        }
    }
    
    
    /*
    * 
    *THIS FUNCTION ALLOW TO GET ALL THE OLD MEDICAL APPOINTMENT FROM THE DATABASE
    *
    */

    public function get_old_medical_appointment($appointment_date){
        try{
            //CREATE THE SQL QUERY TO ADD A NEW MEDICAL APPOINTMENT
            $query = "SELECT utilisateurs.nom, utilisateurs.prenom, utilisateurs.email, rendez_vous.appointment_date, rendez_vous.appointment_hour FROM `rendez_vous` JOIN `utilisateurs` ON utilisateurs.id = rendez_vous.user_id WHERE rendez_vous.appointment_date <= :appointment_date";

            $statement = $this->db->prepare($query);

            // ASSIGN VALUES TO PARAMETERS
            $statement->bindParam(':appointment_date', $appointment_date);


            //EXECUTE THE QUERY
            $statement->execute();

             //FETCH ALL DATA
             $appointments = $statement->fetchAll(PDO::FETCH_ASSOC);

             return $appointments;
            

        } catch (PDOException $e){
            echo json_encode("Erreur lors de l'obtention des rendez-vous médicaux: ".$e->getMessage());
        }
    }

    /*
    * 
    * THIS FUNCTION ALLOWS TO OBTAIN ALL FUTURE MEDICAL APPOINTMENTS FROM THE DATABASE
    *
    */

    public function get_future_medical_appointment($appointment_date){
        try{
            //CREATE THE SQL QUERY TO ADD A NEW MEDICAL APPOINTMENT
            $query = "SELECT utilisateurs.nom, utilisateurs.prenom, utilisateurs.email, rendez_vous.appointment_date, rendez_vous.appointment_hour FROM `rendez_vous` JOIN `utilisateurs` ON utilisateurs.id = rendez_vous.user_id WHERE rendez_vous.appointment_date >= :appointment_date";

            $statement = $this->db->prepare($query);

            // ASSIGN VALUES TO PARAMETERS
            $statement->bindParam(':appointment_date', $appointment_date);


            //EXECUTE THE QUERY
            $statement->execute();

             //FETCH ALL DATA
             $appointments = $statement->fetchAll(PDO::FETCH_ASSOC);

             return $appointments;
            

        } catch (PDOException $e){
            echo json_encode("Erreur lors de l'obtention des rendez-vous médicaux: ".$e->getMessage());
        }
    }
}