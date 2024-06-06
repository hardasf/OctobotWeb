<?php
session_start();

if (!isset($_SESSION["id"])) {
    header("Location: 125.php");
    exit();
}

include 'configdb.php';

$id = $_SESSION["id"];
$name = $_SESSION["name"];
$FbUid = $_SESSION["FbUid"];

// Example of using FbUid to get coin balance from the database
$query = "SELECT coins FROM users WHERE id = '$id'";
$result = mysqli_query($conn, $query);

if (!$result) {
    // Handle query error
    echo "Error: " . mysqli_error($conn);
} else {
    // Process query result
    $row = mysqli_fetch_assoc($result);
    $coins = $row['coins'];
    echo "Coin Balance: " . $coins;
}

// Close the database connection
mysqli_close($conn);
?>
