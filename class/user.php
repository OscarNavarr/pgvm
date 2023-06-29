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
            

            // Preparar la consulta SQL para insertar un nuevo usuario
            $query = "INSERT INTO `utilisateurs` (`nom`, `prenom`, `password`, `email`, `poste`)
                         VALUES (:nom, :prenom, :password, :email, :poste)";

            $statement = $this->db->prepare($query);

            // Asignar los valores a los parámetros de la query
            $statement->bindParam(':nom', $nom, PDO::PARAM_STR);
            $statement->bindParam(':prenom', $prenom, PDO::PARAM_STR);
            $statement->bindParam(':password', $password_ok, PDO::PARAM_STR);
            $statement->bindParam(':email', $email, PDO::PARAM_STR);
            $statement->bindParam(':poste', $poste, PDO::PARAM_STR);

            // Ejecutar la query
            $statement->execute();

            //IF ALL IS OK
            echo "New user was added successfully";

        } catch (PDOException $e) {
            die ("Error al insertar usuario: " . $e->getMessage());
        }
    }

    
    /*
    * 
    *THIS FUNCTION ALLOW GET ALL USERS FROM THE DATABASE
    *
    */


    public function getAlltUser() {
        try {

            // Preparar la consulta SQL para insertar un nuevo usuario
            $query = "SELECT * FROM `utilisateurs`";
            
            $statement = $this->db->prepare($query);

            // Ejecutar la query
            $statement->execute();
            
            //FETCH ALL DATA
            $users = $statement->fetchAll(PDO::FETCH_ASSOC);

            return $users;
            
        } catch (PDOException $e) {
            echo "Error to get all users: " . $e->getMessage();
        }
    }


    /*
    * 
    *THIS FUNCTION CHECK IF THE USER EXISTS BY HIS EMAIL IN THE DATABASE
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
            echo "Error to check if the email exist in the database: " . $e->getMessage();
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
            exit();
       }else{

           $email_ok = $this->validateAndAssignValue($email);
       }
       

        return $email_ok;
    }
}
?>
