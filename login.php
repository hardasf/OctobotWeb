<?php
include 'configdb.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $FbUid = $_POST["FbUid"];
    $password = $_POST["password"];

    // Fetch user from database based on FbUid
    $stmt = $conn->prepare("SELECT id, name, coins, FbUid, password FROM users WHERE FbUid = ?");
    $stmt->bind_param("s", $FbUid);
    $stmt->execute();
    $stmt->bind_result($id, $name, $coins, $dbFbUid, $hashedPassword);
    $stmt->fetch();

    // Verify password using password_verify
    if (password_verify($password, $hashedPassword)) {
        session_start();
        $_SESSION["id"] = $id;
        $_SESSION["name"] = $name;
        $_SESSION["coins"] = $coins;
        $_SESSION["FbUid"] = $FbUid;

        // Close the prepared statement
        $stmt->close();

        // Close the database connection
        $conn->close();

        // Redirect to coins processing
        header("Location: process_coins.php");
        exit(); // Make sure to exit after header redirect
    } else {
        header("Location: 125.php?hard=Failed po awts");
        exit(); // Make sure to exit after header redirect
    }
}
?>