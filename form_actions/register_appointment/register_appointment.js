const send_register_appointment_form = async () => {

    try {

        // Get the form and form data
        const formulario = document.getElementById("register_appointment_form");
        const datos = new FormData(formulario);

        // Send a POST request to the server
        const response = await fetch("../form_actions/register_appointment/register_appointment.php", {
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

        if(data.includes("Le nouveau rendez-vous a été ajouté avec succès")){
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: data,
                showConfirmButton: false,
                timer: 1500
            });
        };

        /**
         * 
         * IF WE HAVE ANY ERROR WITH THE EMAIL
         * 
         */
        
        if(data.includes("email") || data.includes("e-mail") ){
            document.getElementById("email_error_id").classList.remove("hidden");
            document.getElementById("email_error_text").innerHTML = data;

            document.getElementById("email").addEventListener("keypress", function() {
                document.getElementById("email_error_id").classList.add("hidden");
                document.getElementById("email_error_text").innerHTML = "";
            }); 
        }

        /**
         * 
         * IF TIME FIELD IS EMPTY 
         * 
         */
        
        if(data.includes("l'heure est vide") ){
            document.getElementById("hour_error_id").classList.remove("hidden");
            document.getElementById("hour_error_text").innerHTML = data;

            document.getElementById("time").addEventListener("click", function() {
                document.getElementById("hour_error_id").classList.add("hidden");
                document.getElementById("hour_error_text").innerHTML = "";
            });
        }


    } catch (error) {
        console.log(error)
    }

}