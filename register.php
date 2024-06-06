<?php
include 'configdb.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $coins = 20;
    $FbUid = $_POST["FbUid"];
    $password = $_POST["password"];
    

    // Check if FbUid is already registered
    $checkStmt = $conn->prepare("SELECT COUNT(*) FROM users WHERE FbUid = ?");
    $checkStmt->bind_param("s", $FbUid);
    $checkStmt->execute();
    $checkStmt->bind_result($count);
    $checkStmt->fetch();
    $checkStmt->close();

    if ($count > 0) {
        header("Location: 125.php?hard=FbUid already registered");
        exit(); // Stop execution if FbUid is already registered
    }

    // Hash the password securely
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Insert data into the database
    $insertStmt = $conn->prepare("INSERT INTO users (name, coins, FbUid, password) VALUES (?, ?, ?, ?)");
    $insertStmt->bind_param("ssss", $name, $coins, $FbUid, $hashedPassword);

    if ($insertStmt->execute()) {
        header("Location: 125.php?hard=Registration complete");
    } else {
        header("Location: 125.php?hard=Failed po awts");
    }

    $insertStmt->close();
}

$conn->close();
?>

<html>
<body>
    <h2>Register</h2>
    <form method="post" action="register.php">
        Name: <input type="text" name="name" required><br>
        FbUid: <input type="text" name="FbUid" required><br>
        Password: <input type="password" name="password" required><br>
        <input type="submit" value="Register">
    </form>
</body>
</html>
