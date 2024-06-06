<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION["id"])) {
    header("Location: login.php");
    echo "***error uie****";
    exit();
}

// Include database configuration
include 'configdb.php';

// Set coins to LocalStorage
echo '<script>';
echo 'var coins = ' . $_SESSION["coins"] . ';';
echo 'localStorage.setItem("coins", coins);';
echo '</script>';
echo '<h2 style="font-size:60px;a " align="center ">🐙</h2>
	 <p align="center">Welcome to OctoBotWeb</p>
	 <center>
	<a style="font-size:40px;text-decoration:none" href="index.php?hard=Login successfully 😗">💬open</a></center>';
// Redirect to index.php after processing
//header("Location: index.php");
//exit();
?>
