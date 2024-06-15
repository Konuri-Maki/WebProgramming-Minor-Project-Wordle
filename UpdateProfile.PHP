<?php
session_start();

if(!isset($_SESSION["isLoggedIn"]) || !$_SESSION["isLoggedIn"]){
    header("Location: login.php");
}
else if(!isset($_SESSION["UID"])){
    header("Location: logout.php");
}

$newComment = $_POST["comment"];
$UID = $_SESSION["UID"];


$servername = "localhost";
$serverUserName = "root";
$dbPassword = "";
$dbname = "minor_gallery";

$db = new mysqli($servername, $serverUserName, $dbPassword, $dbname) or die("Connection failed:");


$query = $db->prepare("UPDATE profiles SET description = ? WHERE user_id = ?") ;
$query->bind_param("si", $newComment,$UID); // new way to prevent SQL Injection
$query->execute();

$_SESSION["description"] = $newComment;
$_SESSION["hasUpdatedProfile"] = true;
$query->close();
$db->close();



header("Location: profile.php");