<?php
/**
 * Function to update URL parameters
 * 
 * This function is used inside the followers files:
 *      side_menu.php, 
 *      options_card.php,
 *      show_all_users_table.php
 *
 * @param string $url The original URL
 * @param array $params An associative array of parameter names and their values
 * @return string The updated URL with the new parameters
 */
function updateUrlParameters($url, $params) {
    $parsedUrl = parse_url($url);

    // Get the query string
    $queryString = '';
    if (isset($parsedUrl['query'])) {
        $queryString = $parsedUrl['query'];
    }

    // Parse the query string into an associative array
    parse_str($queryString, $existingParams);

    // Merge the existing parameters with the new ones
    $updatedParams = array_merge($existingParams, $params);

    // Build the new query string
    $newQueryString = http_build_query($updatedParams);

    // Build the updated URL
    $updatedUrl = $parsedUrl['path'] . '?' . $newQueryString;

    return $updatedUrl;
}
