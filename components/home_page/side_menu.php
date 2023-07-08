<?php

    session_start();

    // Get the url 
    $url = $_SERVER['REQUEST_URI'];
    
    //Get the action 
    $action = $_GET["action"];

    //Import updateUrlParemeter function from helpers folder
    include_once "../helpers/update_url.php";    
    
    //Import clean_url function from helpers folder
    include_once "../helpers/clean_url.php"; 

?>
<section class="w-[3.5rem] hover:md:w-[15rem] bg-[#00aaff]">
    
    <div class="w-[2.5rem] mx-1  pt-[4rem]">
        <a 
            href="<?php echo(!isset($action)) ? $url : clean_url($url)?>" 
            class="w-[2.5rem] h-[2.5rem] border-[0.1rem] border-white p-2 rounded-lg flex "
        >
            <img src="../public/icons/hogar.png" class="w-[2rem] h-[1.8rem] pb-1" alt="create_user"> 
            <span class="text-white pl-7 hidden md:block">Dashboard</span>
        </a>

        <br>
       <?php
            if($_SESSION["user"]["poste"] === "admin"):
        ?>
            <a 
                href="<?php echo($action === "create-user") ? $url : updateUrlParameters($url, ['action' => 'create-user'])?>" 
                class="w-[2.5rem] h-[2.5rem] border-[0.1rem] border-white p-2 rounded-lg flex "
            >
                <img src="../public/icons/add_user.png" class="w-[2rem] h-[1.8rem] pb-1" alt="create_user">  
                <span class="text-white whitespace-nowrap pl-7 hidden md:block">Nouvel employé</span>
            </a>
            <br>
            <a 
                href="<?php echo($action === "create-date") ? $url : updateUrlParameters($url, ['action' => 'create-date'])?>" 
                class="w-[2.5rem] h-[2.5rem] border-[0.1rem] border-white p-2 rounded-lg flex "
            >
                <img src="../public/icons/calendar-write.png" class="w-[2rem] h-[1.8rem] pb-1" alt="create_user">
                <span class="text-white whitespace-nowrap pl-7 hidden md:block">Rendez-vous</span>  
            </a>
            <br>
        <?php endif; ?>
        
    </div>
    
</section>