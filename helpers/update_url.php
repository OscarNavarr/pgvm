<?php
/**
 * 
 * Function to update URL parameter 
 * This function is used inside side_menu.php file
 *  
 **/ 
    function updateUrlParameter($url, $paramName, $paramValue) {
        $parsedUrl = parse_url($url);

        // Get the query string
        $queryString = '';
        if (isset($parsedUrl['query'])) {
            $queryString = $parsedUrl['query'];
        }

        // Parse the query string into an associative array
        parse_str($queryString, $params);

        // Update the parameter value
        $params[$paramName] = $paramValue;

        // Build the new query string
        $newQueryString = http_build_query($params);

        // Build the updated URL
        $updatedUrl = $parsedUrl['path'] . '?' . $newQueryString;

        return $updatedUrl;
    }