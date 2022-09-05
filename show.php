
<?php

$title = "Show"; //title for current page


// include PDO pour la connexion BDD
require_once("models/database.php");

$game = getGame();
$title = $game['name'];
require("view/showPage.php")
?>


