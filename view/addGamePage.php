<?php 

$title = "Add Game"; //title for current page
ob_start();
require("partials/_addGame.php");

$content = ob_get_clean();
require("layout.php");