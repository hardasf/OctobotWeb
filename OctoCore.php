<?php
// Define the bot prefix
$prefix = '*';

// Get the message from the user
$message = isset($_POST['message']) ? $_POST['message'] : '';

// Check if the message is not empty
if (!empty($message)) {
    // Check if the message starts with the bot prefix
    if (substr($message, 0, strlen($prefix)) === $prefix) {
        // Extract the command and parameters
        $commandWithParams = trim(substr($message, strlen($prefix)));
        $commandParts = explode(' ', $commandWithParams);
        $command = $commandParts[0];
        $params = array_slice($commandParts, 1);

        // Get the command file
        $commandFile = "cmds/{$command}.php";

        // Check if the command file exists
        if (file_exists($commandFile)) {
            // Start output buffering to capture the command's response
            ob_start();

            // Include the command file
            include $commandFile;

            // Get the command's response from the output buffer
            $response = ob_get_clean();

            // Output the response
            echo $response;
        } else {
            // Command not found
            echo "✖️cmd not found";
        }
    } else {
        // No prefix, redirect to nopref.php
        $commandFile = "nopref.php";

        // Check if the command file exists
        if (file_exists($commandFile)) {
            // Start output buffering to capture the command's response
            ob_start();

            // Include the command file
            include $commandFile;

            // Get the command's response from the output buffer
            $response = ob_get_clean();

            // Output the response
            echo $response;
        } else {
            // nopref.php not found
            echo "Command handler for commands without prefix not found.";
        }
    }
} else {
    // Empty message
    echo "Message is empty.";
}
?>