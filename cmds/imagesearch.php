<?php

if (!empty($params)) {
    
    $query = urlencode(implode(' ', $params));

    
    $accessKey = '9FRRtuOTgLbQ1mXXcAHvHIR2mi_Z-QP4C7S5X6vLdjg';
    $apiUrl = "https://api.unsplash.com/search/photos?query={$query}&per_page=1&client_id={$accessKey}";

    
    $curl = curl_init($apiUrl);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $apiResponse = curl_exec($curl);
    curl_close($curl);

    
    $apiResponse = json_decode($apiResponse, true);

    // response awts
    if (!empty($apiResponse['results'][0]['urls']['regular'])) {
        $imageUrl = $apiResponse['results'][0]['urls']['regular'];

      
      //Send to Message
        echo "<img src='{$imageUrl}' alt='Image' style='width: 100%; height: 400px;'>";
    } else {
        echo "No image found for the given query.";
    }
} else {
    // No query provided
    echo "Please provide a query to search for images.";
}
?>