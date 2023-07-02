/**
 * 
 * THIS CODE ALLOWS OBTAINING THE FORM DATA WITHOUT THE NEED TO RELOAD THE PAGE
 * 
 */

// Function to show error message for a specific element
const showErrorMessage = (elementId, message) => {
  const errorElement = document.getElementById(elementId);
  errorElement.innerHTML = message;
  errorElement.classList.remove("hidden");
};

// Function to hide error message for a specific element
const hideErrorMessage = (elementId) => {
  const errorElement = document.getElementById(elementId);
  errorElement.innerHTML = "";
  errorElement.classList.add("hidden");
};

// Function to handle form submission
const sendForm = async (url_post) => {

  try {
    // Array of fields to check for errors
    const errorFields = ["nom", "prenom", "email", "password"];

    // Get the form and form data
    const formulario = document.getElementById("register_user_form");
    const datos = new FormData(formulario);

    // Send a POST request to the server
    const response = await fetch(url_post ? url_post : "../form_actions/register_user/register_user.php", {
      method: "POST",
      body: datos
    });

    // Parse the response as JSON
    const data = await response.json();
  
    console.log(data);
    /**
     * 
     * IF EVERYTHING IS OK AND THERE WAS NO ERROR
     * 
     */

    if (data.includes("New user was added successfully")) {
      Swal.fire({
        position: 'center',
        icon: 'success',
        title: data,
        showConfirmButton: false,
        timer: 1500
      });
      
      // Loop through each field and hide error messages
      errorFields.forEach((field) => {
        const errorElementId = `${field}_error_id`;
        const errorElementText = `${field}_error_text`;
        const errorElement = document.getElementById(errorElementId);

      
          
          hideErrorMessage(errorElementText);
          errorElement.classList.add("hidden");
        
      });
      return null;
    }


    /*
    *
    * IF THE EMAIL IS DUPLICATED
    *   
    */

    if (data.includes("Duplicate entry")) {

      document.getElementById("email_error_id").classList.remove("hidden");
      document.getElementById("email_error_text").innerHTML = "L'e-mail est déjà utilisé, veuillez en essayer un autre.";

      // Loop through each field and hide error messages
      errorFields.forEach((field) => {
        if (field !== "email") {
          
          const errorElementId = `${field}_error_id`;
          const errorElementText = `${field}_error_text`;
          const errorElement = document.getElementById(errorElementId);

          hideErrorMessage(errorElementText);
          errorElement.classList.add("hidden");

        } 
      });

      
    }

    /**
     * 
     * IF AN EMPTY FIELD EXISTS
     * 
     */

    if(typeof(data) == 'object') {
      
      // Loop through each field and show/hide the corresponding error message
      errorFields.forEach((field, index) => {
        const errorElementId = `${field}_error_id`;
        const errorElementText = `${field}_error_text`;
        const errorElement = document.getElementById(errorElementId);

        if (data[index] !== null) {
          showErrorMessage(errorElementText, data[index]);
          errorElement.classList.remove("hidden");
        } else {
          errorElement.classList.add("hidden");
        }

      });
    };
  } catch (e) {
    // Display a general error message if an exception occurs
    document.getElementById("error_result").innerHTML = "Une erreur s'est produite, veuillez vérifier les journaux de la console.";
    console.log(e);
  }
}

