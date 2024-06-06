<?php
// Command: showcmds
// Description: Lists all available commands
// Cooldown: None

// Directory where command files are stored
$cmdsDirectory = 'cmds/';

// Get all PHP files in the cmds directory
$commandFiles = glob($cmdsDirectory . '*.php');

// Output the list of commands
echo "List of All Commands <br>";
foreach ($commandFiles as $file) {
    // Get the command name without the .php extension
    $commandName = basename($file, '.php');
    echo "<b>- $commandName</b><br>";
    
}
?>