<?php
$conversationFile = 'conversation.json';

// Create an empty array to overwrite the conversation data
$emptyConversationData = [];

// Save the empty conversation data to the JSON file
file_put_contents($conversationFile, json_encode($emptyConversationData));

// Redirect to a different page after the operation
header("Location: index.php?hard=conversation data reset successfully ");



?>