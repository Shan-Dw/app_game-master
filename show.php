
<?php

$title = "Show"; //title for current page


// include PDO pour la connexion BDD
require_once("models/Game.php");
$model = new Game();
$game = $model->get();
$title = $game['name'];
require("view/showPage.php")
?>


