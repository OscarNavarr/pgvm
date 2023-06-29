/**
 * 
 * THIS CODE ALLOWS OBTAINING THE FORM DATA WITHOUT THE NEED TO RELOAD THE PAGE
 * 
 */
  const sendForm = async() => {
    try {
      const formulario = document.getElementById("register_user_form");
      const datos = new FormData(formulario);
  
      const response = await fetch("../form_actions/register_user/register_user.php", {
        method: "POST",
        body: datos
      });
  
      const data = await response.text();
      
      if (data === "New user was added successfully"){
        Swal.fire({
          position: 'center',
          icon: 'success',
          title: data,
          showConfirmButton: false,
          timer: 1500
        });

    };
      console.log(data)
      
    } catch (error) {
      document.getElementById("resultado").innerHTML = "An error occurred, please look the console logs";
      console.log(error);
    }
  }
  