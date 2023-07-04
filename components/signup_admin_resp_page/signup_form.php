<div class="mt-[6rem] max-w-[27rem] mx-auto">
    <h3 class="text-center text-[2.3rem] text-slate-400">
        Créer un compte administrateur ou responsable
    </h3>
    <hr>
</div>
<form id="register_user_form" class="max-w-[27rem] mx-auto mt-[2rem] p-8">
        
        <!-- NOM FIELDS -->
        <div class="md:flex md:justify-between">
            <label for="nom" class="pt-5">Nom:</label>
            <br>
            <input type="text" name="nom" id="nom" placeholder="Nom de l'employé" required class="border-b-black border-b-[0.1rem] w-[90%] md:max-w-[15rem] h-[2.5rem] outline-0 px-2 mt-2">
        </div>
        <div class="w-[90%] md:w-full min-h-[4rem] hidden rounded-xl bg-red-300 mt-3 text-center" id="nom_error_id">
            <p class="p-2" id="nom_error_text" class="text-center">Error</p>
        </div>

        <!-- PRENOM FIELDS -->
        <div class="md:flex md:justify-between mt-8">
            <label for="prenom" class="pt-5">Prénom:</label>
            <br>
            <input type="text" name="prenom" id="prenom" placeholder="Prénom de l'employé" required class="border-b-black border-b-[0.1rem] w-[90%] md:max-w-[15rem] h-[2.5rem] outline-0 px-2 mt-2">
        </div>
        <div class="w-[90%] md:w-full min-h-[4rem] hidden rounded-xl bg-red-300 mt-3 text-center" id="prenom_error_id">
            <p class="p-2" id="prenom_error_text" class="text-center">Error</p>
        </div>

        <!-- EMAIL FIELDS -->
        <div class="md:flex md:justify-between mt-8">
            <label for="email" class="pt-5">Email:</label>
            <br>
            <input type="email" name="email" id="email" placeholder="Email de l'employé" required class="border-b-black border-b-[0.1rem] w-[90%] md:max-w-[15rem] h-[2.5rem] outline-0 px-2 mt-2">
        </div>
        <div class="w-[90%] md:w-full min-h-[4rem] hidden rounded-xl bg-red-300 mt-3 text-center" id="email_error_id">
            <p class="p-2" id="email_error_text" class="text-center">Error</p>
        </div>

        <!-- POSTE FIELDS -->
        <div class="md:flex md:justify-between mt-8">
            <label for="email" class="pt-5">Poste:</label>
            <br>
            <select name="poste" id="poste" class="w-[90%] md:max-w-[15rem] outline-0 border-b-black border-b-[0.1rem]">
                <option value="admin">Administrateur</option>
                <option value="responsable">Responsable</option>
            </select>
        </div>
        
        <!-- PASSWORD FIELDS -->
        <div class="md:flex md:justify-between mt-8">
            <label for="password" class="pt-5">Mot de Pass:</label>
            <br>
            <input type="password" name="password" id="password" placeholder="Mot de pass" required class="border-b-black border-b-[0.1rem] w-[90%] md:max-w-[15rem] h-[2.5rem] outline-0 px-2 mt-2">
        </div>
        <div class="w-[90%] md:w-full min-h-[4rem] hidden rounded-xl bg-red-300 mt-3 text-center" id="password_error_id">
            <p class="p-2" id="password_error_text" class="text-center">Error</p>
        </div>

        <div class="flex justify-center mt-5">
            <button type="button" onclick="sendForm()" class="bg-blue-300 hover:bg-blue-400 h-[3rem] w-[10rem] rounded-lg text-white">
                Créer un utilisateur
            </button>
        </div>
        
    </form>
    <div id="error_result"></div>