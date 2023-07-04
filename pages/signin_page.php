<?php

    //IMPORT HEADER FROM COMPONENTS FOLDER
    require_once "../components/header.php";
?>

<div class="w-full h-screen flex justify-center items-center">
    <div class="w-[80%]">

        <h1 class="font-bold text-center text-[1.2rem]">Connectez-vous pour accéder au Dashboard</h1>
        
        <hr/>

        <div class="flex justify-center">

            <?php
                //IMPORT SIGNIN FORM FROM COMPONENTS FOLDER
                include_once "../components/signin_page/signin_form.php";
            ?>

        </div>

    </div>

</div>

<?php
    //IMPORT FOOTER FROM COMPONENTS FOLDER
    require_once "../components/footer.php";
    
?>