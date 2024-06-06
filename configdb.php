<?php
// Replace with your database credentials
$servername = "sql12.freemysqlhosting.net";
$username = "sql12712161";
$password = "QsugAGajXH";
$dbname = "sql12712161";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>