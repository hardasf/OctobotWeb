<?php
// Command: fetch
// Description: Fetches a response from the API with a custom question
// Cooldown: None

// Check if parameters are provided
if (!empty($params)) {
    // Join the parameters into a single string (assuming the question)
    $question = implode(' ', $params);

    // Call the API with the custom question
    $apiResponse = callAPI($question);

    // Extract the reply from the API response
    $reply = isset($apiResponse['reply']) ? $apiResponse['reply'] : 'No reply from the API';

    // Output the response
    echo $reply;
} else {
    // No question provided
    echo "This command requires a question. Please provide a question.";
}

// Function to call the API and retrieve the response
function callAPI($question) {
    // URL of the API with the custom question appended
    $apiUrl = 'https://openai-rest-api.vercel.app/hercai?model=v3&ask=' . urlencode($question);

    // Make a GET request to the API
    $curl = curl_init($apiUrl);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $apiResponse = curl_exec($curl);
    curl_close($curl);

    // Decode the JSON response
    $apiResponse = json_decode($apiResponse, true);

    return $apiResponse;
}
?>