<?php
 
    $rv_passes_message = "Cet employé n'a pas de rendez-vous médicaux antérieurs.";
    $rv_venir_message = "Cet employé n'a aucun rendez-vous médical à venir.";
    if(!empty($appointments)):
    
?>
<div class="lg:flex lg:justify-center my-[3rem] w-[17.5rem] min-h-[6rem] md:w-[37rem] lg:w-auto overflow-x-auto mx-auto">
   
    <table class="table-auto border-slate-300 border-[0.15rem] rounded-md ">
      <thead class="border-slate-300 border-[0.15rem] rounded-md h-[3rem] bg-[#89D8FF]">
        <tr> 
          <th class="border-r-slate-300 border-r-[0.15rem] px-4">Nom</th>
          <th class="border-r-slate-300 border-r-[0.15rem] px-4">Prenom</th>
          <th class="border-r-slate-300 border-r-[0.15rem] px-4">Email</th>
          <th class="border-r-slate-300 border-r-[0.15rem] px-4">Appointment_date</th>
          <th class="border-r-slate-300 border-r-[0.15rem] px-4">Appointment_hour</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($appointments as $appointment): ?>
            <tr class="border-slate-300 border-[0.15rem] h-[3rem]" >
              <td class="border-r-slate-300 border-r-[0.15rem] px-2 text-center"><p><?= $appointment["nom"] ?></p></td>
              <td class="border-r-slate-300 border-r-[0.15rem] px-2 text-center"><p><?= $appointment["prenom"] ?></p></td>
              <td class="border-r-slate-300 border-r-[0.15rem] px-2 text-center">
                <a href="mailto:<?= $appointment["email"] ?>"><?= $appointment["email"] ?></a>
              </td>
              <td class="border-r-slate-300 border-r-[0.15rem] px-4 text-center"><p><?= $appointment["appointment_date"] ?></p></td>
              <td class="border-r-slate-300 border-r-[0.15rem] px-4 text-center"><p><?= strstr($appointment["appointment_hour"], ":00.", true) ?></p></td>
            </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
</div>

<?php 
    else: 
?>
<div class="mt-10 mb-5">
    <h1 class="md:text-center mx-[2rem] md:mx-0 text-slate-300 text-[1.5rem] md:text-[2rem]"><?php echo(($_GET["option"] == "rv-passes") ? $rv_passes_message : $rv_venir_message) ?></h1>
</div>

<?php endif; ?>