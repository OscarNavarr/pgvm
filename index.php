<?php

    session_start();

    //WE VALIDETE IF WE HAVE A USER AND REDIRECT TO HOME PAGE OR SIGNIN PAGE 
    if (isset($_SESSION["user"]) && !empty($_SESSION["user"])){
        header("Location: ./pages/home_page.php");
    }else{
        header("Location: ./pages/signin_page.php");
    }

