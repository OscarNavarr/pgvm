/**
 * 
 * THIS CODE ALLOWS OBTAINING THE FORM DATA WITHOUT THE NEED TO RELOAD THE PAGE
 * 
 */

function sendForm() {
    var formulario = document.getElementById("register_user_form");
    var datos = new FormData(formulario);
  
    fetch("../form_actions/register_user/register_user.php", {
      method: "POST",
      body: datos
    })
    .then(response => response.text())
    .then(data => {
      //MOSTRAR QUE TODO FUE OK
      document.getElementById("resultado").innerHTML = data;
    })
    .catch(error => {
      console.log(error);
    });
  }
  