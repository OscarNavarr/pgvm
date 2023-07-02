<?php 

/**
 * 
 * Function to delete all variables from the URL parameters 
 * This function is used inside side_menu.php file
 *  
 **/ 
    function clean_url($url) {
        $parsedURL = parse_url($url);
        return $parsedURL["path"];
    }

?>