<?php
// Importar el archivo de conexión
require_once '../connection/db_connect.php';

try {
    if ($db) {
        // Definir la consulta para crear la tabla con campo 'poste' y campo 'email' único
        $query = "CREATE TABLE IF NOT EXISTS `utilisateurs` (
                    `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
                    `nom` VARCHAR(50) NOT NULL,
                    `prenom` VARCHAR(50) NOT NULL,
                    `password` VARCHAR(255) NOT NULL,
                    `email` VARCHAR(100) NOT NULL UNIQUE,
                    `poste` VARCHAR(50) NOT NULL
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8";

        // Ejecutar la consulta para crear la tabla
        $db->exec($query);

        echo "La tabla 'usuarios' se ha creado correctamente.";

        // Cerrar la conexión
        $db = null;
    }
} catch (PDOException $e) {
    echo "Error al crear la tabla: " . $e->getMessage();
}
?>
