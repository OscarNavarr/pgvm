<?php

//IMPORT DATABASE CONNECTION
include_once "../connection/db_connect.php";

//IMPORT USER CLASS
 include_once "../class/user.php";

 //IMPORT MEDICAL APPOINTMENT CLASS
 include_once "../class/medical_appointment.php";


 // Get the url 
 $url = $_SERVER['REQUEST_URI'];
    
 //Get the action 
 $action = $_GET["action"];

 //Import updateUrlParemeter function from helpers folder
 include_once "../helpers/update_url.php";    
 
 //Import clean_url function from helpers folder
 include_once "../helpers/clean_url.php"; 

 //GET DATE FROM THE SERVER 
$server_date = date("Y-m-d");

//CREATE NEW USER INSTANCE
$user = new User($db);

//GET ALL USER IN THE DATABASE
 $all_employees = $user->getAlltEmployees();

 //CREATE NEW MEDICAL APPOINTMENT INSTANCE
 $medical_appointment = new Medical_Appointment($db);

 //GET THE OLDS MEDICALS APPOINTMENTS
 $olds_appointments = $medical_appointment->get_old_medical_appointment($server_date);

 //GET ALL THE FUTURE MEDICALS APPOINTMENTS
 $future_appointments = $medical_appointment->get_future_medical_appointment($server_date);
 
?>

<div id="section_cards" class="w-full max-w-[50rem] min-h-[5rem] md:flex md:justify-around md:mx-auto">
        
        <!-- CARD ONE -->
        <div id="card_one" class="bg-[#00bfff] w-[13rem] mx-auto mt-3 py-2 rounded-md">
            <div id="header">
                <h3 class="text-white text-center text-[1.2rem]">Quantité d'employés:</h3>
                <p class="text-center text-slate-300 text-[2rem]"><?= sizeof($all_employees) ?></p>
            </div>
            <div id="footer" class="w-full flex justify-center ">
                <a href="<?php echo(!isset($action)) ? $url : clean_url($url)?>" class="bg-[#00aaff] hover:border-white hover:border-[0.1rem] text-white w-[8rem] h-[2.5rem]  rounded-lg text-center py-2">Regarder</a>
            </div>
        </div>
       
        <!-- CARD TWO -->
        <div id="card_one" class="bg-[#00bfff] w-[13rem] mx-auto mt-3 py-2 rounded-md">
            <div id="header">
                <h3 class="text-white text-center text-[1.2rem]">Rendez-vous passés:</h3>
                <p class="text-center text-slate-300 text-[2rem]"><?= sizeof($olds_appointments) ?></p>
            </div>
            <div id="footer" class="w-full flex justify-center ">
                <a href="<?php echo($action === "old-rendez-vous") ? $url : updateUrlParameter($url, 'action', 'old-rendez-vous')?>"  class="bg-[#00aaff] hover:border-white hover:border-[0.1rem] text-white w-[8rem] h-[2.5rem]  rounded-lg text-center py-2">Regarder</a>
            </div>
        </div>
       
        <!-- CARD TWO -->
        <div id="card_one" class="bg-[#00bfff] w-[13rem] mx-auto mt-3 py-2 rounded-md">
            <div id="header">
                <h3 class="text-white text-center text-[1.2rem]">Rendez-vous à venir:</h3>
                <p class="text-center text-slate-300 text-[2rem]"><?= sizeof($future_appointments) ?></p>
            </div>
            <div id="footer" class="w-full flex justify-center ">
                <a href="<?php echo($action === "future-rendez-vous") ? $url : updateUrlParameter($url, 'action', 'future-rendez-vous')?>" class="bg-[#00aaff] hover:border-white hover:border-[0.1rem] text-white w-[8rem] h-[2.5rem]  rounded-lg text-center py-2">Regarder</a>
            </div>
        </div>

    </div>