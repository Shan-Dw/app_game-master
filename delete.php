<?php
session_start();
require_once("models/Game.php");
$model = new Game();
$model->delete();

