const sendSigninForm = async () => {
   
    // Get the form and form data
    const form = document.getElementById("signin_user_form");
    const input_data = new FormData(form);

    // Get the values from the inputs
    const email = document.getElementById("email");
    const password = document.getElementById("password");

    if(!email.value && !password.value){

        
    }else{
        console.log("Algo mal")
    }
    
}