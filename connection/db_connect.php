<?php
    // Datos de conexión a la base de datos remota
    /* $hostname = 'db5013529946.hosting-data.io';
    $port = '3306';
    $database = 'dbs11336335';
    $username = 'dbu3057968';
    $password = '#P$TWi9bt8XMb8';
    */

    // Datos de conexión a la base de datos local

    define("DBHOST", "localhost");
    define("DBUSER", "root");
    define("DBPASSWORD", "");
    define("DBNAME", "pgvm");
    
    // Crear una nueva instancia de PDO remote
    //$dsn = "mysql:host=$hostname;port=$port;dbname=$database";

    //CREATE DSN LOCALE
    $dsn = "mysql:dbname=".DBNAME. ";host=".DBHOST;
    
    try {


        $db = new PDO($dsn, DBUSER, DBPASSWORD);


        $db->exec("SET NAMES utf8");

        // Configurar el modo de error para lanzar excepciones en caso de error
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

        
    } catch (PDOException $e) {
        echo "Error al conectar a la base de datos: " . $e->getMessage();
    }
?>
