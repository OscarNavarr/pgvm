<?php

require_once "../connection/db_connect.php";


try {
    

    if ($db) {
        // Define the query to delete the table
        $query = "DROP TABLE `rendez_vous`";

        // Execute the query to delete the table
        $db->exec($query);

        echo "Le tableau 'rendez-vous' a été supprimé avec succès.";

        // Close the connection
        $db = null;
    }
} catch (PDOException $e) {
    echo "Erreur lors de la suppression du tableau : " . $e->getMessage();
}


?>