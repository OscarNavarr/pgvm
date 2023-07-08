
<div class="mt-[6rem] max-w-[27rem] mx-auto">
    <h3 class="text-center text-[2.3rem] text-slate-400">Créer un utilisateur</h3>
    <hr>
</div>
<form id="register_user_form" class="max-w-[27rem] mx-auto mt-[2rem] p-8">

    <div class="md:flex md:justify-between">
        <label for="nom" class="md:pt-5">Nom:</label>
        <br>
        <input type="text" name="nom" id="nom" placeholder="Nom de l'employé" required class="border-b-black border-b-[0.1rem] w-[90%] md:max-w-[15rem] h-[2.5rem] outline-0 px-2 mt-2">
    </div>
    <div class="w-[90%] md:w-full min-h-[4rem] hidden rounded-xl bg-red-300 mt-3" id="nom_error_id">
        <p class="p-2" id="nom_error_text">Error</p>
    </div>

    <div class="md:flex md:justify-between mt-8">
        <label for="prenom" class="md:pt-5">Prénom:</label>
        <br>
        <input type="text" name="prenom" id="prenom" placeholder="Prénom de l'employé" required class="border-b-black border-b-[0.1rem] w-[90%] md:max-w-[15rem] h-[2.5rem] outline-0 px-2 mt-2">
    </div>
    <div class="w-[90%] md:w-full min-h-[4rem] hidden rounded-xl bg-red-300 mt-3" id="prenom_error_id">
        <p class="p-2" id="prenom_error_text">Error</p>
    </div>

    <div class="md:flex md:justify-between mt-8">
        <label for="email" class="md:pt-5">Email:</label>
        <br>
        <input type="email" name="email" id="email" placeholder="Email de l'employé" required class="border-b-black border-b-[0.1rem] w-[90%] md:max-w-[15rem] h-[2.5rem] outline-0 px-2 mt-2">
    </div>
    <div class="w-[90%] md:w-full min-h-[4rem] hidden rounded-xl bg-red-300 mt-3" id="email_error_id">
        <p class="p-2" id="email_error_text">Error</p>
    </div>

    <div class="md:flex md:justify-between mt-8">
        <label for="password" class="md:pt-5">Mot de Pass:</label>
        <br>
        <input type="password" name="password" id="password" placeholder="Mot de pass" required class="border-b-black border-b-[0.1rem] w-[90%] md:max-w-[15rem] h-[2.5rem] outline-0 px-2 mt-2">
    </div>
    <div class="w-[90%] md:w-full min-h-[4rem] hidden rounded-xl bg-red-300 mt-3" id="password_error_id">
        <p class="p-2" id="password_error_text">Error</p>
    </div>

    <input type="hidden" name="poste" value="employé">
    <div class="w-[90%] md:w-full min-h-[4rem] hidden rounded-xl bg-red-300 mt-3" id="poste_error_id">
        <p class="p-2" id="poste_error_text">Error</p>
    </div>

    <div class="flex justify-center mt-5">
        <button type="button" onclick="sendForm()" class="bg-blue-300 hover:bg-blue-400 h-[3rem] w-[10rem] rounded-lg text-white">
            Créer un utilisateur
        </button>
    </div>
    
</form>
<div id="error_result"></div>
