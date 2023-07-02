<main>

    <?php 
        //WE GET THE ACTION FROM THE URL
        $action = $_GET["action"];

        //IMPORT THE OPTIONS CARD
        include_once "../components/home_page/side_dashboard/dashboard_subcomponents/options_card.php";


        switch($action){
            
            case "old-rendez-vous":
                //SHOW OLD MEDICALS APPOINTMENTS TABLE 
                include_once "../components/home_page/side_dashboard/dashboard_subcomponents/show_old_appointment_table.php";
            break;

            case "future-rendez-vous":
                //SHOW FUTURE MEDICALS APPOINTMENTS TABLE 
                include_once "../components/home_page/side_dashboard/dashboard_subcomponents/show_future_appointment_table.php";
            break;

            default:
                //SHOW ALL EMPLOYEE TABLE
                include_once "../components/home_page/side_dashboard/dashboard_subcomponents/show_all_users_table.php";
            break;
        }
    ?>

</main>