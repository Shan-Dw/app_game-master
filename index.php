
<?php
/** This file show the home page */
session_start(); 
// include PDO for DB connexion
require_once("models/Game.php");
$model = new Game();
$games = $model->getAll();

require("view/homePage.php")
?>


