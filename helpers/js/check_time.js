/**
 * 
 * THIS FUNCTION CHECKS IF THE TIME TYPE INPUT FIELD IS CORRECT
 * THIS FUNCTION IS USED INSIDE create_medical_appointment.php FILE
 *   
 **/ 


// GET FIELDS BY THEIR ID
var timeInput = document.getElementById("time");
var hour_error = document.getElementById("hour_error_id");
var hour_error_text = document.getElementById("hour_error_text");

timeInput.addEventListener("change", function() {

    var selectedTime = timeInput.value;
    var minTime = "08:00";
    var maxTime = "16:00";

    if(!hour_error.classList.contains("hidden")){
        hour_error.classList.add("hidden");
        hour_error_text.innerHTML = "";
    };
    

    if (selectedTime < minTime || selectedTime > maxTime) {
        hour_error.classList.remove("hidden");
        hour_error_text.innerHTML = "L'heure sélectionnée est en dehors de la plage autorisée.";
        timeInput.value = "";
    }
});