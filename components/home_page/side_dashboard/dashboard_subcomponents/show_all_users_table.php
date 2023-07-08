<?php
   
  //IMPORT DATABASE CONNECTION
  include_once "../connection/db_connect.php";

  //IMPORT USER CLASS
  include_once "../class/user.php";
  
  //CREATE NEW USER INSTANCE
  $user = new User($db);

  //GET ALL USER IN THE DATABASE
  $all_employees = $user->getAlltEmployees();
  
  //IMPORT updateUrlParemeter FUNCTION FROM HELPERS FOLDER
  include_once "../helpers/update_url.php";  
  
  if($_SESSION["user"]["poste"] === "admin" || $_SESSION["user"]["poste"] === "responsable"):
    if(!empty($all_employees)):
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
              <td class="border-r-slate-300 border-r-[0.15rem] px-2 text-center"><p><?=strtoupper($employee["nom"]) ?></p></td>
              <td class="border-r-slate-300 border-r-[0.15rem] px-2 text-center"><p><?= $employee["prenom"] ?></p></td>
              <td class="border-r-slate-300 border-r-[0.15rem] px-2 text-center">
                <a href="mailto:<?= $employee["email"] ?>"><?= $employee["email"] ?></a>
              </td>
              <td>
                <a href="<?php echo updateUrlParameters($url, ['action' => 'detail', 'id' => $employee['id'], 'option' => "rv-passes"]) ?>" class="bg-[#00aaff] hover:cursor-pointer text-white text-center py-2  px-3 rounded-md w-[5rem] min-h-[2rem] mx-2">Détail</a>
              </td>
            </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
    
</div>
  <?php endif; ?>
<?php endif; ?>