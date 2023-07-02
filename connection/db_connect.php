<?php
    // Connection data to the remote database
    /* $hostname = 'db5013529946.hosting-data.io';
    $port = '3306';
    $database = 'dbs11336335';
    $username = 'dbu3057968';
    $password = '#P$TWi9bt8XMb8';
    */

    // Connection data to the local database

    define("DBHOST", "localhost");
    define("DBUSER", "root");
    define("DBPASSWORD", "");
    define("DBNAME", "pgvm");
    
    // Create a new instance of PDO remote
    //$dsn = "mysql:host=$hostname;port=$port;dbname=$database";

    //CREATE DSN LOCALE
    $dsn = "mysql:dbname=".DBNAME. ";host=".DBHOST;
    
    try {


        $db = new PDO($dsn, DBUSER, DBPASSWORD);


        $db->exec("SET NAMES utf8");

        // Configure error mode to throw exceptions on error
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

        
    } catch (PDOException $e) {
        echo "Error al conectar a la base de datos: " . $e->getMessage();
    }
?>
