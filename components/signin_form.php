<form action="./auth/authentication.php" method="post" class="w-[25rem] border-black border-[0.1rem] mx-auto mt-[15rem] p-8">

    <div class="flex justify-between">
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" placeholder="addressemail@gmail.com" require class="border-black border-[0.1rem] rounded-md w-[60%] px-2">
    </div>
    <div class="flex justify-between mt-5">
        <label for="password">Mot de Pass:</label>
        <input type="password" name="password" id="password" placeholder="Mot de pass" require class="border-black border-[0.1rem] rounded-md w-[60%] px-2">
    </div>
    <hr class="mt-5">

    <div class="flex justify-center mt-5">
        <input type="submit" value="Login" class="bg-blue-300 h-[3rem] w-[6rem] rounded-lg text-white">
    </div>

</form>