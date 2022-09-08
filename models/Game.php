<?php 
require("database.php");
class Game 
{
    /** This function return all games in an array
*/
  function getAllGames(): array
    {
        //0- variable pdo
        $pdo = getPDO();
        //1- Get "jeux"
        $sql = "SELECT * FROM jeux ORDER BY name";
        // 2- prépare la requette (préformatter)
        $query = $pdo->prepare($sql);
        // 3- execute la requette
        $query->execute();
        // 4- on stock le resultat ds une variable
        $games = $query->fetchAll();
        
        return $games;
    }
    /** This function return current id of item */
  function getId(): int
  {
      if (!empty($_GET['id']) && is_numeric($_GET['id'])) {
        $id = clear_xss($_GET['id']);  
    } else {
        $_SESSION["error"] = "URL invalide";
        header("location: index.php");
    }
    return $id;
  }
  function getGame(): array
    {
        $pdo = getPDO();
        $id = $this->getId();
         // 3- requette (query in english) vers BDD
        $sql = "SELECT * FROM jeux WHERE id=:id";
         // 4- préparation de la requette
        $query = $pdo->prepare($sql);
         // 5- securiser la requette contre injection sql
        $query->bindValue(':id', $id, PDO::PARAM_INT);
         // 6- executer la requette vers la BDD
        $query->execute();
         // 7- on stock tout ds une variable
        $game = $query->fetch();
         // debug_array($game);
         // $game = [];
        if (!$game) {
             $_SESSION["error"] = "Ce jeu n'est pas disponible.";
             header("location: index.php");
         }
         return $game;
        }
}