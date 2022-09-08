<?php
require("utils/helpers/functions.php");
/** Get connexion with database
*/
function getPDO(): PDO
{
    $serveur = "localhost";
    $dbname = "app_game";
    $login = "root";
    $password = "";
    
    try {
        $pdo = new PDO("mysql:host=$serveur;dbname=$dbname", $login, $password, array(
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
            // for no double
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            // show mistake
            PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
        ));
        // echo "connexion succes";
        return $pdo;
     } catch (PDOException $e) {
        echo "Erreur de connexion : " . $e->getMessage();
     }      
}
    
