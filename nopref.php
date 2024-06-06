<?php
// Get the message from the user
$message = isset($_POST['message']) ? strtolower($_POST['message']) : '';

// Define responses based on user input
$responses = array(
    "hi" => "Hello Im 🐙OctoBotWeb",
    "hello" => "Hi there!",
    "prefix" => "my prefix is *", 
    "*" => "use *+commandName", 
    // Add more responses for other inputs as needed
);

// Check if the user input matches any predefined response
if (array_key_exists($message, $responses)) {
    echo $responses[$message];
} else {
    // Default response if no match is found
    echo "🤖";
}
?>