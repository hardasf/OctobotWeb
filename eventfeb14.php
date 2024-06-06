<?php

// Files where the coins and last usage date are stored
$usageFile = 'usage.txt';

// Function to add coins
function addCoins() {
    // Get the current coins from localStorage
    $currentCoins = isset($_COOKIE['coins']) ? $_COOKIE['coins'] : 0;

    // Generate random coins to add
    $coinsToAdd = rand(1, 50);

    // Add the random value to the current coins
    $totalCoins = $currentCoins + $coinsToAdd;

    // Update localStorage with the new total coins
    setcookie("coins", $totalCoins);

    // Redirect back to index.php with a message
    header("Location: index.php?hard=Added $coinsToAdd coins to your account.");
    exit(); // Make sure to exit after redirecting
}

// Function to check if the script can be used today
function canUseScriptToday($usageFile) {
    if (file_exists($usageFile)) {
        $lastUsageDate = file_get_contents($usageFile);
        // Check if last usage date is today
        if ($lastUsageDate === date('Y-m-d')) {
            return false; // Script has already been used today
        }
    }
    return true;
}

// Check if the script can be used today
if (canUseScriptToday($usageFile)) {
    // Add coins if the script can be used today
    addCoins();
    
    // Update last usage date
    file_put_contents($usageFile, date('Y-m-d'));
} else {
    // Inform the user that the script has already been used today
    $message = "Sorry, you have already used the script today. Please come back tomorrow!";
    
    header("Location: index.php?hard=$message");
    exit(); // Make sure to exit after redirecting
}

?>