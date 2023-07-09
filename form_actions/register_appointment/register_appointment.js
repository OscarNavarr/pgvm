const send_register_appointment_form = async () => {

    try {

        //GET THE BUTTON REFERENCE BY HIS ID 
        const button = document.getElementById("btn_appointment");
        
        //DISABLE THE BUTTON
        button.disabled = true;

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

        /**
         * 
         * IF EVERYTHING IS OK AND THERE WAS NO ERROR
         * 
         */

        if(data.includes("Le nouveau rendez-vous a été ajouté avec succès")){
            
            //WE WILL SEND THE EMAIL TO EMPLOYEE AND RESPONSABLE
            const email_employe = await fetch("../helpers/send_email_to_employe.php", {
                method: "POST",
                body: datos
            });
            const email_responsable = await fetch("../helpers/send_email_to_responsable.php", {
                method: "POST",
                body: datos
            });

            const resp_email_employe =await email_employe.json();
            const resp_email_responsable =await email_responsable.json();

            if(resp_email_employe.includes("Le message a été envoyé") && resp_email_responsable.includes("Le message a été envoyé")){
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: "Excellent",
                    text: 'Le nouveau rendez-vous a été ajouté avec succès et le message a été envoyé',
                    showConfirmButton: false,
                    timer: 5000
                    
                });
                //TURN FALSE THE DISABLE BUTTON PROPERTY 
                button.disabled = false;
            }else{
                Swal.fire({
                    position: 'center',
                    icon: 'error',
                    title: "Oopss!",
                    text: "L'e-mail n'a pas pu être envoyé correctement, l'e-mail de l'employé peut être incorrect ou il n'y a toujours pas de responsable",
                    showConfirmButton: false,
                    timer: 5000
                });

                //TURN FALSE THE DISABLE BUTTON PROPERTY 
                button.disabled = false;

                return null;
            }

            
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

            //TURN FALSE THE DISABLE BUTTON PROPERTY 
            button.disabled = false;
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
            
            //TURN FALSE THE DISABLE BUTTON PROPERTY 
            button.disabled = false;
        }

        /**
         * 
         * IF MEDICAL APPOINTMENT EXISTS 
         * 
         */
        
        if(data.includes("le même jour et à la même heure") ){
            
            Swal.fire({
                position: 'center',
                icon: 'error',
                title: "Oopss!",
                text: "Vous avez déjà créé un rendez-vous médical pour cet employé le même jour et à la même heure",
                showConfirmButton: false,
                timer: 5000
            });

            //TURN FALSE THE DISABLE BUTTON PROPERTY 
            button.disabled = false;
        }


    } catch (error) {
        console.log(error);

        //TURN FALSE THE DISABLE BUTTON PROPERTY 
        button.disabled = false;
    }

}