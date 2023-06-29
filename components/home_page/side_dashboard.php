<?php
    //WE GET THE ACTION FROM THE URL
    $action = $_GET["action"];
?>

<section class="w-full <?php echo(empty($action)) ? "flex justify-center" : ""  ?>">
    
    <?php
        //VALIDATE IF THE ACTION IS NULL
        if (empty($action)):
    ?>
        <div class=" h-full flex justify-center items-center ">
            <h3 class="text-slate-300 text-[1.4rem] w-[80%] text-justify md:text-center ">Veuillez sélectionner une option dans le menu de gauche.</h3>
        </div>

    <?php elseif ($action === "create-user"): 
     
     //SHOW CREATE USER COMPONENT IF THE ACTION IS NOT NULL
        include_once "../components/home_page/side_dashboard/create_employee_account.php";
    ?>

    <?php endif; ?>

</section>