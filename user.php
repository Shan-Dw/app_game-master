<?php
/** This file show the user page */
session_start(); 
// include PDO for DB connexion
require_once("models/User.php");
$model = new User();
$users = $model->getAll("name");

require("view/userPage.php")
?>
