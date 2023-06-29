<?php
    // WE START THE SESSION TO GET ACCESS TO THE GLOBAL $_SESSION VARIABLE
    session_start();

    // WE DELETE THE USER SESSION DATA
    unset($_SESSION["user"]);

    //WE REDIRECT THE USER TO THE LOGIN PAGE
    header("Location: ../index.php");
?>