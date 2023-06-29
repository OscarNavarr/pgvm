<form id="register_user_form" class="max-w-[27rem] mx-auto mt-[6rem] p-8">

    <div class="md:flex md:justify-between">
        <label for="nom">Nom:</label>
        <br>
        <input type="text" name="nom" id="nom" placeholder="Nom de l'employé" require class="border-b-black border-b-[0.1rem] w-[90%] max-w-[15rem] px-2 mt-2">
    </div>

    <div class="md:flex md:justify-between mt-8">
        <label for="prenom">Prénom:</label>
        <br>
        <input type="text" name="prenom" id="prenom" placeholder="Prénom de l'employé" require class="border-b-black border-b-[0.1rem] w-[90%] max-w-[15rem] px-2 mt-2">
    </div>

    <div class="md:flex md:justify-between mt-8">
        <label for="email">Email:</label>
        <br>
        <input type="email" name="email" id="email" placeholder="Email de l'employé" require class="border-b-black border-b-[0.1rem] w-[90%] max-w-[15rem] px-2 mt-2">
    </div>

    <div class="md:flex md:justify-between mt-8">
        <label for="password">Mot de Pass:</label>
        <br>
        <input type="password" name="password" id="password" placeholder="Mot de pass" require class="border-b-black border-b-[0.1rem] w-[90%] max-w-[15rem] px-2 mt-2">
    </div>
    
    <input type="hidden" name="poste" value="employé">

    <div class="flex justify-center mt-5">
        <button type="button" onclick="sendForm()" class="bg-blue-300 h-[3rem] w-[10rem] rounded-lg text-white">
            Créer un utilisateur
        </button>
    </div>
    
</form>
<div id="resultado"></div>
