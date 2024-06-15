<?php
session_start();

$_SESSION = array();

session_destroy();

$redirect_page = 'main.php';
header("Location: $redirect_page");
exit();
