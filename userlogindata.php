<?php
// userlogindata.php

// Establish connection to the database
/*
$servername = "sql308.hstn.me";
$username = "mseet_35440521";
$password = "rejard07";
$database = "mseet_35440521_hard";
*/
$servername = "sql12.freemysqlhosting.net";
$username = "sql12712161";
$password = "QsugAGajXH";
$database = "sql12712161";
// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to get the number of users
$sql_count_users = "SELECT COUNT(*) as total_users FROM users";
$result_count_users = $conn->query($sql_count_users);

// Query to get user names
$sql_get_names = "SELECT name FROM users";
$result_get_names = $conn->query($sql_get_names);

// Close the connection
$conn->close();
?>