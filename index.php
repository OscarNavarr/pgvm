<?php

    session_start();

    //WE VALIDETE IF WE HAVE A USER AND REDIRECT TO HOME PAGE
    if (isset($_SESSION["user"]) && !empty($_SESSION["user"])){
        header("Location: ./pages/home_page.php");
    }

    //IMPORT HEADER FROM COMPONENTS FOLDER
    require_once "./components/header.php";

    //IMPORT LOGIN FORM 
    include_once "./components/signin_form.php";
?>
   
<?php
    //IMPORT FOOTER FROM COMPONENTS FOLDER
    require_once "./components/footer.php";

