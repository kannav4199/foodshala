<?php
session_start();
if(session_destroy()) // Destroying All Sessions
{
header("Location: restaurantlogin.php"); // Redirecting To Home Page
}
?>