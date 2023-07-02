<?php
   
  //IMPORT DATABASE CONNECTION
  include_once "../connection/db_connect.php";

  //IMPORT USER CLASS
  include_once "../class/user.php";
  
  //CREATE NEW USER INSTANCE
  $user = new User($db);

  //GET ALL USER IN THE DATABASE
  $all_employees = $user->getAlltEmployees();

  
?>
<div class="md:flex md:justify-center my-[3rem] mb-[3rem] w-[20rem] min-h-[8rem] md:w-auto overflow-x-auto mx-auto">
    <input type="hidden" id="save_info" value="">
    <table class="table-auto border-slate-300 border-[0.15rem] rounded-md ">
      <thead class="border-slate-300 border-[0.15rem] rounded-md h-[3rem] bg-[#89D8FF]">
        <tr>
          <th class="border-r-slate-300 border-r-[0.15rem]">Nom</th>
          <th class="border-r-slate-300 border-r-[0.15rem]">Prenom</th>
          <th class="border-r-slate-300 border-r-[0.15rem]">Email</th>
          <th >Option</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($all_employees as $employee): ?>
            <tr class="border-slate-300 border-[0.15rem] h-[3rem]" >
              <td class="border-r-slate-300 border-r-[0.15rem] px-2 text-center"><p><?= $employee["nom"] ?></p></td>
              <td class="border-r-slate-300 border-r-[0.15rem] px-2 text-center"><p><?= $employee["prenom"] ?></p></td>
              <td class="border-r-slate-300 border-r-[0.15rem] px-2 text-center">
                <a href="mailto:<?= $employee["email"] ?>"><?= $employee["email"] ?></a>
              </td>
              <td>
                <button class="bg-[#00aaff] text-white rounded-md w-[5rem] h-[2rem] mx-2">Détail</button>
              </td>
            </tr>
        <?php endforeach; ?>
      </tbody>
    </table>

</div>