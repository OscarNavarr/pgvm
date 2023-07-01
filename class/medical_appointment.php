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
}