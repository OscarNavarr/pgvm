<main>

    <?php 
        //WE GET THE ACTION FROM THE URL
        $action = $_GET["action"];

        switch($action){
            
            case "old-rendez-vous":
                
                //IMPORT THE OPTIONS CARD
                include_once "../components/home_page/side_dashboard/dashboard_subcomponents/options_card.php";
                
                //SHOW OLD MEDICALS APPOINTMENTS TABLE 
                include_once "../components/home_page/side_dashboard/dashboard_subcomponents/show_old_appointment_table.php";
            
            break;

            case "future-rendez-vous":
                
                //IMPORT THE OPTIONS CARD
                include_once "../components/home_page/side_dashboard/dashboard_subcomponents/options_card.php";

                //SHOW FUTURE MEDICALS APPOINTMENTS TABLE 
                include_once "../components/home_page/side_dashboard/dashboard_subcomponents/show_future_appointment_table.php";
            
            break;
            
            case "detail":
                
                //SHOW FUTURE MEDICALS APPOINTMENTS TABLE 
                include_once "../components/home_page/side_dashboard/user_detail.php";
            
            break;

            default:

                //IMPORT THE OPTIONS CARD
                include_once "../components/home_page/side_dashboard/dashboard_subcomponents/options_card.php";

                //SHOW ALL EMPLOYEE TABLE
                include_once "../components/home_page/side_dashboard/dashboard_subcomponents/show_all_users_table.php";

            break;
        }
    ?>

</main>