<?php
    //GET ID OF USER
    $id_user = strip_tags($_GET["id"]);

    //IMPORT DATABASE CONNECTION
    include_once "../connection/db_connect.php";

    //IMPORT USER CLASS
    include_once "../class/user.php";

    //IMPORT MEDICAL APPOINTMENT CLASS
    include_once "../class/medical_appointment.php";

    //Import clean_url function from helpers folder
    include_once "../helpers/clean_url.php"; 
    
    // Get the url 
    $url = $_SERVER['REQUEST_URI'];

    //CREATE NEW USER INSTANCE
    $user = new User($db);
    
    //GET DATE FROM THE SERVER 
    $server_date = date("Y-m-d");

    //CREATE NEW MEDICAL APPOINTMENT INSTANCE
    $medical_appointment = new Medical_Appointment($db);
    
    //GET USER DATA BY HIS ID
    $get_user = $user->getUserByID(intval($id_user));

    if($_GET["option"] == "rv-passes"){
        //GET THE OLDS MEDICALS APPOINTMENTS
        $appointments = $medical_appointment->get_old_medical_appointment_by_id($server_date, intval($id_user));

    }elseif($_GET["option"] == "rv-venir"){

        //GET THE FUTURE MEDICALS APPOINTMENTS
        $appointments = $medical_appointment->get_future_medical_appointment_by_id($server_date, intval($id_user));
    }



?>
<section class="w-full h-full flex justify-center">
    <div class="w-[90%] min-h-[10rem] mt-[5rem] border-slate-300 border-[0.1rem] rounded-md">

        <header>
            <h3 class="text-center text-2xl mt-4 "><?= $get_user["prenom"]." ".$get_user["nom"] ?></h3>

            <div class="flex justify-center my-2">
                <a href="mailto:<?= $get_user["email"]?>" class="text-slate-300 "><?= $get_user["email"]?></a>
            </div>
            <hr class="w-[90%] mx-auto">
        </header>

        <div class="mt-5">
            <form class="w-[90%] mx-auto flex flex-wrap  justify-center">
                <label class="mr-4">
                    <input type="radio" name="opcion" id="rv-passes" value="rv-passes" <?php echo ($_GET["option"] === "rv-passes") ? "checked" : "" ?>>
                    Rendez-vous passés
                </label>
                <br>
                <label class="mr-4">
                    <input type="radio" name="opcion" id="rv-venir" value="rv-venir" <?php echo ($_GET["option"] === "rv-venir") ? "checked" : "" ?>>
                    Rendez-vous à venir
                </label>
            </form>
        </div>

        <?php 
            include_once "../components/home_page/side_dashboard/user_detail_subcomponents/appointment_table.php";
        ?>
        <div class="flex justify-center mb-3">
            <a href="<?php echo clean_url($url) ?>" class="bg-[#00bfff] text-white text-center text-[1.1rem] py-3 w-[6rem] h-[3rem]">Sortir</a>
        </div>
    </div>
    
</section>

<script  src="../form_actions/show_user_info_by_id/show_user_info.js"></script>