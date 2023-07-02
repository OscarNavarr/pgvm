<?php

    //WE VALIDETE IF WE DO NOT HAVE A USER AND REDIRECT TO LOGIN    
    
    session_start();
    if (!isset($_SESSION["user"]) && empty($_SESSION["user"])){
        header("Location: ../index.php");
    }

    //IMPORT HEADER FROM COMPONENTS FOLDER
    include_once "../components/header.php";

    //IMPORT NAVBAR FROM COMPONENTS FOLDER
    include_once "../components/navbar.php";

    ?>

    <div class="flex min-h-screen">
        
        <?php
            //IMPORT SIDE MENU FROM COMPONENTS FOLDER
            include_once "../components/home_page/side_menu.php";
    
            //IMPORT SIDE MENU FROM COMPONENTS FOLDER
            include_once "../components/home_page/side_dashboard.php";
        ?>

    </div>
    

   
<?php
    //IMPORT FOOTER FROM COMPONENTS FOLDER
    include_once "../components/footer.php";

