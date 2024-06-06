<?php
// Retrieve the username, message, and response from the POST data
$userName = $_POST['userName'];
$message = $_POST['message'];
$response = $_POST['response'];

// Path to the conversation JSON file
$conversationFile = 'conversation.json';

// Load existing conversation data or initialize an empty array if the file doesn't exist
$conversationData = file_exists($conversationFile) ? json_decode(file_get_contents($conversationFile), true) : [];

// Append the new entry (username, message, and response) to the conversation data
$conversationData[] = array(
    'userName' => $userName,
    'message' => $message,
    'response' => $response
);

// Save the updated conversation data back to the JSON file
file_put_contents($conversationFile, json_encode($conversationData));
?>