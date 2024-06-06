<?php
// Command: embed
// Description: Embeds a website in the chat interface
// Cooldown: None

// Check if parameters are provided
if (!empty($params)) {
    // Get the website URL from the parameters
    $websiteUrl = $params[0];

    // Generate the HTML for embedding the website
    $embedCode = '<iframe src="' . htmlspecialchars($websiteUrl) . '" width="100%" height="400" frameborder="0" scrolling="auto"></iframe>';

    // Output the embedded website HTML
    echo $embedCode;
} else {
    // No website URL provided
    echo "Please provide a website URL to embed.";
}
?>