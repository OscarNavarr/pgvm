<form id="signin_user_form" class="mt-[3rem]" >
    <div class="w-[100%] min-h-[4rem] bg-red-300 rounded-md hidden" id="signin_form_error">
        <p id="signin_form_error_text" class="text-center p-4">Error</p>
    </div>
    <br>
    <label class=" md:inline-flex mr-[5.3rem]">E-mail:</label> 
    <input 
        type="email"
        name="email"
        id="email" 
        placeholder="Écrivez votre e-mail" 
        class="text-black w-[15rem] md:w-[17rem]  focus:text-center h-[2.5rem] border-b-[0.1rem] border-b-black outline-none" 
    />
    <br/>
    
    <div class="flex flex-wrap mt-5 mt-0 ">
        <label class="md:inline-flex pt-7  mr-[2rem]">Mot de passe:</label>
        
        <div>
            <input 
                type="password" 
                name="password"
                id="password"
                placeholder="Écrivez votre mot de passe" 
                class="text-black w-[15rem]  md:w-[17rem] pl-2 h-[2.5rem] focus:text-center  border-b-[0.1rem] border-b-black outline-none" 
            />
        </div>
    </div>

    <div class="flex justify-center">
        <button type="button" onclick="sendSigninForm()" class="bg-blue-300 hover:bg-blue-400 rounded-lg text-white h-[2.5rem] w-[6rem] mt-10">Login</button>
    </div>
</form>
<script type="text/javascript" src="../form_actions/signin_user/signin_user.js"></script>



