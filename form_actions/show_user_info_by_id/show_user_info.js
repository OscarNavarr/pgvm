const form = document.querySelector('form');
const urlParams = new URLSearchParams(window.location.search);
const selectedOption = urlParams.get('option');


form.addEventListener('change', function(){
    const newOption = form.querySelector('input[name="opcion"]:checked').value;
    

    if(selectedOption) {
        //IF THE OPTION PARAMETER EXISTS, WE UPDATE THE HIS VALUE
        urlParams.set('option', newOption);
    }else{
        
        //IF THE OPTION PARAMETER IS NOT EXISTS, WE CREATE A NEW OPTION PARAMETER
        urlParams.append('option', newOption);
    }
    
    //REDIRECT TO THE UPDATE URL
    window.location.href = `${window.location.pathname}?${urlParams}`;
})


