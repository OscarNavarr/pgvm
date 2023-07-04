

const sendSigninForm = async () => {
   
    // Get the values from the inputs
    const email = document.getElementById("email");
    const password = document.getElementById("password");

    if(!email.value && !password.value){
        
        document.getElementById("signin_form_error").classList.remove("hidden");
            
        document.getElementById("signin_form_error_text").innerHTML = "Les champs email et mot de passe ne peuvent pas être vides, veuillez les remplir.";

        setTimeout(() => {

            document.getElementById("signin_form_error").classList.add("hidden");

            document.getElementById("signin_form_error_text").innerHTML ="";

        }, 5000);
       
        return null;
    }


    try {

        // Array of fields to check for errors
        const errorFields = ["nom", "prenom", "email", "password"];

        // Get the form and form data
        const form = document.getElementById("signin_user_form");
        const input_data = new FormData(form);

        // Send a POST request to the server
        const response = await fetch("../form_actions/signin_user/signin_user.php", {
            method: "POST",
            body: input_data
        });
    
        // Parse the response as JSON
        const data = await response.json();

        //IF THE FORM WAS SENDED TO THE SERVER BUT THE FORM IS EMPTY

        if(data.includes("Les champs email et mot de passe ne peuvent pas être vide")){
        
            document.getElementById("signin_form_error").classList.remove("hidden");
                
            document.getElementById("signin_form_error_text").innerHTML = "Les champs email et mot de passe ne peuvent pas être vides, veuillez les remplir.";

            setTimeout(() => {

                document.getElementById("signin_form_error").classList.add("hidden");

                document.getElementById("signin_form_error_text").innerHTML ="";

            }, 5000);
        
        return null;
        }
        
        //IF THE EMAIL OR PASSWORD NOT EXITS IN THE DATABASE

        if(data.includes("L'utilisateur et/ou le mot de passe est incorrect")){
        
            document.getElementById("signin_form_error").classList.remove("hidden");
                
            document.getElementById("signin_form_error_text").innerHTML = "L'utilisateur et/ou le mot de passe est incorrect.";

            setTimeout(() => {

                document.getElementById("signin_form_error").classList.add("hidden");

                document.getElementById("signin_form_error_text").innerHTML ="";

            }, 5000);
        
        return null;
        }

        //IF ALL IS OK
        if (data.includes("All is ok!")){
            //Redirect to home page
            var url = window.location.href;
            var sub_route = url.substring(0, url.indexOf("/signin"));

            window.location.href = sub_route + "/home_page.php";

        }

    } catch (error) {
        console.log("Error in the signin form : " + error.message);
    }
    

    
}