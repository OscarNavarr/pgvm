<?php
// IMPORT CONNECTION 
require_once '../connection/db_connect.php';

try {
    if ($db) {
        // DEFINING THE QUERY TO CREATE THE TABLE
        $query = "CREATE TABLE IF NOT EXISTS `utilisateurs` (
                    `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
                    `nom` VARCHAR(50) NOT NULL,
                    `prenom` VARCHAR(50) NOT NULL,
                    `password` VARCHAR(255) NOT NULL,
                    `email` VARCHAR(100) NOT NULL UNIQUE,
                    `poste` VARCHAR(50) NOT NULL
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8";

        // EXECUTE QUERY TO CREATE TABLE
        $db->exec($query);

        echo "La table 'utilisateurs' a été créée avec succès.";

        // CLOSE THE CONNECTION
        $db = null;
    }
} catch (PDOException $e) {
    echo "Erreur de création de table: " . $e->getMessage();
}
?>
