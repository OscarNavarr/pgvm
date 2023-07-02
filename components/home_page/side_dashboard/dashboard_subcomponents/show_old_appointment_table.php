<?php


//IMPORT DATABASE CONNECTION
include_once "../connection/db_connect.php";

 //IMPORT MEDICAL APPOINTMENT CLASS
 include_once "../class/medical_appointment.php";

 //GET DATE FROM THE SERVER 
 $server_date = date("Y-m-d");

 //CREATE NEW MEDICAL APPOINTMENT INSTANCE
 $medical_appointment = new Medical_Appointment($db);

 //GET THE OLDS MEDICALS APPOINTMENTS
 $olds_appointments = $medical_appointment->get_old_medical_appointment($server_date);

?>

<div class="md:flex md:justify-center my-[3rem] mb-[3rem] w-[20rem] min-h-[8rem] md:w-auto overflow-x-auto mx-auto">
    <input type="hidden" id="save_info" value="">
    <table class="table-auto border-slate-300 border-[0.15rem] rounded-md ">
      <thead class="border-slate-300 border-[0.15rem] rounded-md h-[3rem] bg-[#89D8FF]">
        <tr>
          <th class="border-r-slate-300 border-r-[0.15rem]">Nom</th>
          <th class="border-r-slate-300 border-r-[0.15rem]">Prenom</th>
          <th class="border-r-slate-300 border-r-[0.15rem]">Email</th>
          <th class="border-r-slate-300 border-r-[0.15rem] px-4">Appointment_date</th>
          <th class="border-r-slate-300 border-r-[0.15rem] px-4">Appointment_hour</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($olds_appointments as $old_appointment): ?>

            <tr class="border-slate-300 border-[0.15rem] h-[3rem]" >
              <td class="border-r-slate-300 border-r-[0.15rem] px-2"><p><?= $old_appointment["nom"] ?></p></td>
              <td class="border-r-slate-300 border-r-[0.15rem] px-2"><p><?= $old_appointment["prenom"] ?></p></td>
              <td class="border-r-slate-300 border-r-[0.15rem] px-2">
                <a href="mailto:<?= $old_appointment["email"] ?>"><?= $old_appointment["email"] ?></a>
              </td>
              <td class="border-r-slate-300 border-r-[0.15rem] px-4"><p><?= $old_appointment["appointment_date"] ?></p></td>
              <td class="border-r-slate-300 border-r-[0.15rem] px-4"><p><?= $old_appointment["appointment_hour"] ?></p></td>
            </tr>
            
        <?php endforeach; ?>
      </tbody>
    </table>

</div>