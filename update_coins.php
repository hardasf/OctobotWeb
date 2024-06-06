<?php
session_start();

if (!isset($_SESSION["id"])) {
    // Redirect if user is not logged in
    header("Location: 125.php");
    exit();
}

include 'configdb.php';

$id = $_SESSION["id"];
$name = $_SESSION["name"];
//$coins = $_SESSION["coins"];
$FbUid = $_SESSION["FbUid"];

// Retrieve coins from the request
$coins = isset($_POST['coins']) ? intval($_POST['coins']) : 0;


// Update coins for the user in the database
$query = "UPDATE users SET coins = $coins WHERE id = '$id'";

if (mysqli_query($conn, $query)) {
    // Coins updated successfully
    echo "Coins updated successfully";
} else {
    // Error updating coins
    echo "Error updating coins: " . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);
?>
