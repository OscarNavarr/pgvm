<?php
    session_start();
    $url = $_SERVER['REQUEST_URI'];
    
    //WE GET THE ACTION FROM THE URL
    $action = $_GET["action"];
?>
<section class="w-[3.5rem] bg-[#00aaff]">
    
    <div class="w-[2.5rem] mx-auto pt-[4rem]">
       
       <?php
            if($_SESSION["user"]["poste"] === "admin"):
        ?>
            <a href="<?php echo($action==="create-user") ? $url : $url."?action=create-user"?>" class="w-[2.5rem] h-[2.5rem] border-[0.1rem] border-white p-2 rounded-lg flex ">
                <img src="../public/icons/add_user.png" class="w-[2rem] h-[1.8rem] pb-1" alt="create_user">  
            </a>
            <br>
        <?php endif; ?>
        <button class=" h-[2.5rem] border-[0.1rem] border-white p-2 rounded-lg ">
            <img src="../public/icons/calendar.png"  alt="create_user">
        </button>
    </div>
    
</section>