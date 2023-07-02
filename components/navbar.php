<?php
    session_start();

    $name = $_SESSION["user"]["nom"];
?>

<nav class="h-[4rem] w-full bg-[#00bfff]">
    <div class="flex justify-between max-w-[90%] mx-auto">
        <a href="../pages/home_page.php" class="text-white text-[1.4rem] py-4">Bienvenue <?= $name ?></a>

        <a href="../auth/sign_off.php" class="text-white text-[1rem] my-2 py-3 px-2 border-[0.1rem] border-white h-[3rem] ">
            Déconnexion
        </a>
    </div>
</nav>