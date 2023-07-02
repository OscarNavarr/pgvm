<?php

require_once "../connection/db_connect.php";


try {
    

    if ($db) {
        // Definir la consulta para borrar la tabla
        $query = "DROP TABLE `utilisateurs`";

        // Ejecutar la consulta para borrar la tabla
        $db->exec($query);

        echo "La tabla 'usuarios' se ha eliminado correctamente.";

        // Cerrar la conexión
        $db = null;
    }
} catch (PDOException $e) {
    echo "Error al borrar la tabla: " . $e->getMessage();
}


?>