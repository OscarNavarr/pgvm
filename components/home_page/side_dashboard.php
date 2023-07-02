<?php
    //WE GET THE ACTION FROM THE URL
    $action = $_GET["action"];
?>

<section class="w-full">
    
    <?php

        switch($action){
            
            case "create-user":
                //SHOW CREATE USER COMPONENT
                include_once "../components/home_page/side_dashboard/create_employee_account.php";
            break;

            case "create-date":
                //SHOW CREATE MEDICAL APPOINTEMENT COMPONENT I
                include_once "../components/home_page/side_dashboard/create_medical_appointment.php";
            break;

            default:
                //SHOW DASHBOARD COMPONENT 
                include_once "../components/home_page/side_dashboard/dashboard.php";
            break;
        }

    ?>
</section>