<?php

class Form_Validator {

    private $nom;
    private $prenom;
    private $email;
    private $password;
    private $poste;

    private $error_nom;
    private $error_prenom;
    private $error_email;
    private $error_password;
    private $error_poste;

    public function __construct($nom, $prenom, $email, $password, $poste){
        $this -> nom = $nom;
        $this -> prenom = $prenom;
        $this -> email = $email;
        $this -> password = $password;
        $this -> poste = $poste;

        $this -> error_nom = $this -> is_nom_variable_correct($nom);
        $this -> error_prenom = $this -> is_prenom_variable_correct($prenom);
        $this -> error_email = $this -> is_email_variable_correct($email);
        $this -> error_password = $this -> is_password_variable_correct($password);
        $this -> error_poste = $this -> is_poste_variable_correct($poste);

    }

    /**
    * Check if a variable is not empty.
    *
    * @param mixed $variable The variable to check.
    * @return bool True if the variable is not empty, false otherwise.
    */

    private function variable_not_empty($variable){
        return isset($variable) && !empty($variable);
    }


    /**
     * Check if the 'nom' variable is correct.
     *
     * @param string $nom The value of the 'nom' variable.
     * @return string|null The error message or null if the 'nom' is correct.
     */
    
    private function is_nom_variable_correct($nom){
    if (!$this->variable_not_empty($nom)){
        return "Vous devez écrire le nom.";
    } elseif (strlen($nom) > 50) {
        return "Le nom d doit contenir moins de 50 caractères.";
    }

    return null; // 'nom' is correct
    }


    /**
     * Check if the 'nom' variable is correct.
     *
     * @param string $nom The value of the 'nom' variable.
     * @return string|null The error message or null if the 'nom' is correct.
     */
    
    private function is_prenom_variable_correct($prenom){
    if (!$this->variable_not_empty($prenom)){
        return "Vous devez écrire le prenom.";
    } elseif (strlen($prenom) > 50) {
        return "Le prenom doit contenir moins de 50 caractères.";
    }

    return null; // 'nom' is correct
    }


    /**
     * Check if the 'email' variable is correct.
     *
     * @param string $email The value of the 'email' variable.
     * @return string|null The error message or null if the 'email' is correct.
     */


    private function is_email_variable_correct($email) {
        if (!$this->variable_not_empty($email)){
            return "Vous devez écrire l'email.";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)){
            return "Le format de l'e-mail n'est pas valide, veuillez écrire l'e-mail correctement.";
        }

        return null; // 'email' is correct
    }


    /**
     * Check if the 'password' variable is correct.
     *
     * @param string $password The value of the 'password' variable.
     * @return string|null The error message or null if the 'password' is correct.
     */

    private function is_password_variable_correct($password) {
        // Define the password validation rules with a regex
        $pattern = '/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[^\w\s]).*$/';

        if (!$this->variable_not_empty($password)){
            return "Vous devez écrire le mot de passe .";
        } elseif (strlen($password) < 8){
            return "Le mot de passe doit comporter plus de 8 caractères.";
        } elseif (!preg_match($pattern, $password)) {
            return "Le mot de passe doit contenir au moins une lettre majuscule, une lettre minuscule, un chiffre et un caractère spécial .";
        }

        return null; // 'password' is correct
    }


    /**
     * Check if the 'poste' variable is correct.
     *
     * @param string $poste The value of the 'poste' variable.
     * @return string|null The error message or null if the 'poste' is correct.
     */
    
    private function is_poste_variable_correct($poste){
        if (!$this->variable_not_empty($poste)){
            return "Vous devez écrire le poste .";
        }

        return null; // 'poste' is correct
    }


       /*
        *
        *THIS FUNCTIONS ALLOWS GET THE NOM, PRENOM, EMAIL, PASSWORD, POSTE 
        *
        */   
    public function get_nom() {
        return $this -> nom;
    }

    public function get_prenom() {
        return $this -> prenom;
    }

    public function get_email() {
        return $this -> email;
    }

    public function get_poste() {
        return $this -> poste;
    }


       /*
        *
        *THIS FUNCTIONS ALLOWS GET THE NOM ERROR, PRENOM ERROR, EMAIL ERROR, PASSWORD ERROR, POSTE ERROR 
        *
        */ 

    public function get_nom_error() {
        return $this -> error_nom;
    }

    public function get_prenom_error() {
        return $this -> error_prenom;
    }

    public function get_email_error() {
        return $this -> error_email;
    }

    public function get_password_error() {
        return $this -> error_password;
    }

    public function get_poste_error() {
        return $this -> error_poste;
    }


    public function is_form_valid() {
        if ($this -> error_nom == null && $this -> error_prenom == null && $this -> error_email == null && $this -> error_password  == null && $this -> error_poste  == null){
            return true;
        }else{
            return false;
        }
    } 
}