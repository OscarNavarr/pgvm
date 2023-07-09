<?php

    //GET DATE FROM THE SERVER 
    $server_date = date("Y-m-d");

    //CREATE NEW DATETIME OBJECT WITH SERVER DATE
    $date = new DateTime($server_date);

    // ADD NEW YEAR TO THE DATETIME OBJECT
    $date->add(new DateInterval('P1Y'));

    //GET NEW DATE 
    $new_date = $date->format('Y-m-d');
?>


    <div class="mt-[6rem] max-w-[27rem] mx-auto px-2">
        <h3 class="text-center text-[2rem] text-slate-400">Créer un rendez-vous médical</h3>
        <hr>
    </div>
    <form id="register_appointment_form" class="max-w-[27rem] mx-auto mt-[2rem] p-8">

        <div class="mx-auto max-w-[15rem]">
            <label for="email">E-mail de l'employé:</label>
            <br>
            <input class="border-b-black border-b-[0.1rem] w-[90%] md:w-full md:max-w-[15rem] h-[2.5rem] outline-0   px-2 mt-2" type="email" name="email" id="email" required placeholder="addresse@gmail.com">
        </div>
        
        <div class="w-[90%] md:w-full min-h-[4rem] hidden rounded-xl bg-red-300 mt-3" id="email_error_id">
            <p class="p-2" id="email_error_text">Error</p>
        </div>

        <div class="mx-auto max-w-[15rem] mt-8">
            <label for="date">Date de rendez-vous:</label>
            <br>
            <input class="border-b-black border-b-[0.1rem] w-[90%] md:w-full md:max-w-[15rem] h-[2.5rem] outline-0  px-2 mt-2" type="date" name="date" id="date" required value="<?php echo $server_date;?>" min="<?php echo $server_date;?>" max="<?php echo $new_date;?>">
        </div>
        
        <div class="mx-auto max-w-[15rem] mt-8">
            <label for="time">Heure de rendez-vous:</label>
            <br>
            <span class="text-slate-400 text-[0.8rem]">De 08h00 à 16h00</span>
            <br>
            <input class="border-b-black border-b-[0.1rem] w-[90%] md:w-full md:max-w-[15rem] h-[2.5rem] outline-0  px-2 mt-2" type="time" name="time" id="time" required min="08:00" max="16:00">
        </div>

        <div class="w-[90%] md:w-full min-h-[4rem] hidden rounded-xl bg-red-300 mt-3" id="hour_error_id">
            <p class="p-2" id="hour_error_text">Error</p>
        </div>
        
        <div class="flex justify-center mt-8">
            <button type="button" onclick="send_register_appointment_form()"  id="btn_appointment" class="bg-blue-300 hover:bg-blue-400 h-[3rem] w-[11rem] rounded-lg text-white">
                Créer un rendez-vous
            </button>
        </div>

    </form>
   
    <!-- THIS SCRIPT CHECKS IF THE TIME TYPE INPUT FIELD IS CORRECT -->
    <script src="../helpers/js/check_time.js"></script>
    <script src="../form_actions/register_appointment/register_appointment.js"></script>