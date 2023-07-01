<?php

if (!empty($_POST)){

    try{
        //IMPORT THE MEDICAL APPOINTMENT CLASS
        include_once "../../class/medical_appointment.php";

        //IMPORT THE CONECTION TO DATABASE
        require_once "../../connection/db_connect.php";

        //CREATE NEW INSTANCE OF MEDICAL_APPOINTMENT CLASS 
        $create_medical_appointment = new Medical_Appointment($db);


        /**
         * LO PRIMERO ES OBTENER EL ID DEL USUARIO A TRAVES DE SU EMAIL O VER COMO PUEDO HACER JOIN DENTRO DE LA CLASE MEDICAL_APPOINTMENT PARA INSERTAR UN RENDE-VOUS CON EL EMAIL DEL USUARIO
         * 
         */
        //$_POST["email"]
        $create_medical_appointment->create_medical_appointment($_POST["date"],$_POST["time"], $user_id);

    }catch(Exception $e){
        die ("Error: " . $e->getMessage());
    } 
}