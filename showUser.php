
<?php

$title = "Show"; //title for current page


// include PDO pour la connexion BDD
require_once("models/User.php");
$model = new User();
$user = $model->get();
$title = $user['name'];
require("view/showUserPage.php")
?>


