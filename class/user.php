<?php
class User {
    
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }
    /*
    * 
    *THIS FUNCTION ALLOW INSERT A NEW USER INTO THE DATABASE
    *
    */


    public function insertUser($nom, $prenom, $password, $email, $poste) {
        try {

            // We make hash to the password
            $password_ok = password_hash($this->validateAndAssignValue($password), PASSWORD_DEFAULT);
            
            //CREATE THE SQL QUERY TO ADD A NEW USER
            $query = "INSERT INTO `utilisateurs` (`nom`, `prenom`, `password`, `email`, `poste`)
                         VALUES (:nom, :prenom, :password, :email, :poste)";

            $statement = $this->db->prepare($query);

            // ASSIGN VALUES TO PARAMETERS
            $statement->bindParam(':nom', $nom, PDO::PARAM_STR);
            $statement->bindParam(':prenom', $prenom, PDO::PARAM_STR);
            $statement->bindParam(':password', $password_ok, PDO::PARAM_STR);
            $statement->bindParam(':email', $email, PDO::PARAM_STR);
            $statement->bindParam(':poste', $poste, PDO::PARAM_STR);

            // EXECUTE THE QUERY
            $statement->execute();

            //IF ALL IS OK
            echo json_encode("New user was added successfully");

        } catch (PDOException $e) {
            echo json_encode("Erreur lors de l'insertion de l'utilisateur: " . $e->getMessage());
        }
    }

    
    /*
    * 
    *THIS FUNCTION ALLOW GET ALL USERS FROM THE DATABASE
    *
    */


    public function getAlltEmployees() {
        try {

            // Preparar la consulta SQL para insertar un nuevo usuario
            $query = "SELECT * FROM `utilisateurs` WHERE `poste` = 'employé'";
            
            $statement = $this->db->prepare($query);

            // Ejecutar la query
            $statement->execute();
            
            //FETCH ALL DATA
            $users = $statement->fetchAll(PDO::FETCH_ASSOC);

            return $users;
            
        } catch (PDOException $e) {
            echo json_encode("Error to get all users: " . $e->getMessage());
        }
    }


    /*
    * 
    *THIS FUNCTION ALLOW GET RESPONSABLE FROM THE DATABASE
    *
    */


    public function getResponsable() {
        try {

            // Preparar la consulta SQL para insertar un nuevo usuario
            $query = "SELECT * FROM `utilisateurs` WHERE `poste` = 'responsable'";
            
            $statement = $this->db->prepare($query);

            // Ejecutar la query
            $statement->execute();
            
            //WE CHECK IF THE EMAIL EXIST
            $user = $statement->fetch(PDO::FETCH_ASSOC);

            return $user;
            
        } catch (PDOException $e) {
            echo json_encode("Error to get responsable: " . $e->getMessage());
        }
    }


    /*
    * 
    *THIS FUNCTION CHECK IF THE USER EXISTS BY HIS EMAIL IN THE DATABASE AND RETURN THE USER
    *
    */


    public function getUserByEmail($email) {
        try {

            // VALIDATE IF THE EMAIL IS CORRECT 
            $email_ok = $this->validateAndAssignEmail($email);

            //CREATE STATEMENT
            $query = "SELECT * FROM `utilisateurs` WHERE `email` = :email";

            //PREPARE CONNECTION
            $statement = $this->db->prepare($query);

            $statement->bindParam(':email', $email_ok, PDO::PARAM_STR);

            //WE EXECUTE THE STATEMENT
            $statement->execute();

            //WE CHECK IF THE EMAIL EXIST
            $user = $statement->fetch(PDO::FETCH_ASSOC);

            if(!empty($user)){
                return $user;
            }else{
                return false;
            }

        } catch (PDOException $e) {
            echo json_encode("Error to check if the user exist in the database by his email: " . $e->getMessage());
        }
    }


    /*
    * 
    *THIS FUNCTION CHECK IF THE USER EXISTS BY HIS ID IN THE DATABASE AND RETURN THE USER
    *
    */

    public function getUserByID($id) {
        try {

            //CREATE STATEMENT
            $query = "SELECT * FROM `utilisateurs` WHERE `id` = :id";

            //PREPARE CONNECTION
            $statement = $this->db->prepare($query);

            $statement->bindParam(':id', $id, PDO::PARAM_INT);

            //WE EXECUTE THE STATEMENT
            $statement->execute();

            //WE CHECK IF THE EMAIL EXIST
            $user = $statement->fetch(PDO::FETCH_ASSOC);

            if(!empty($user)){
                return $user;
            }else{
                return false;
            }

        } catch (PDOException $e) {
            echo json_encode("Error to check if the user exist in the database by his id: " . $e->getMessage());
        }
    }


    /*
    * 
    *THIS FUNCTION MAKE AN VALIDATION TO THE ARGUMENTS 
    *
    */


    private function validateAndAssignValue($value) {
        
        //Eliminar espacios en blanco al inicio y al final del valor
        $value_ok = trim($value);
        //Eliminar etiquetas html
        $value_ok = strip_tags($value_ok);

        return $value_ok;
    }


    /*
    * 
    *THIS FUNCTION MAKE AN VALIDATION TO THE EMAIL 
    *
    */


    private function validateAndAssignEmail($email) {
        
       if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            die ("Invalid email, please whrite the an correct email address");
       }else{

           $email_ok = $this->validateAndAssignValue($email);
       }
       

        return $email_ok;
    }
}
?>
