<?php
// Load existing conversation from conversation.json
$conversation = json_decode(file_get_contents('conversation.json'), true);

// Retrieve last poll time from the request
$lastPollTime = isset($_GET['lastPollTime']) ? $_GET['lastPollTime'] : null;

// Filter out messages that are newer than the last poll time
$newMessages = array_filter($conversation, function ($message) use ($lastPollTime) {
    return strtotime($message['timestamp']) > $lastPollTime;
});

// Return new messages as JSON
echo json_encode($newMessages);
?>