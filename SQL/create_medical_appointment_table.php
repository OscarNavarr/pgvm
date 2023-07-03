<?php

// IMPORT CONNECTION
require_once '../connection/db_connect.php';

try {
    if ($db) {
        // DEFINING THE QUERY TO CREATE THE TABLE
        $query = "CREATE TABLE IF NOT EXISTS `rendez_vous`(
            `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY, 
            `appointment_date` DATE NOT NULL, 
            `appointment_hour` TIME(6) NOT NULL, 
            `user_id` INT NOT NULL, 
            `registration_date` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
            FOREIGN KEY (`user_id`) REFERENCES `utilisateurs` (`id`)
        )";

        // EXECUTE QUERY TO CREATE TABLE
        $db->exec($query);

        echo "La table 'rendez-vous' a été créée avec succès.";

        // CLOSE THE CONNECTION
        $db = null;
    }
} catch (PDOException $e) {
    echo "Erreur de création de table: " . $e->getMessage();
}
?>
