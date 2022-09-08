<?php 
require("database.php");
abstract class Model 
{
  private $pdo;
  protected $table;
  
  public function __construct()
  {
    $this->pdo = getPDO();
  }
    /** This function return all items in an array
*/
  function getAll($order=""): array
  {
        //1- Get "jeux"
        $sql = "SELECT * FROM {$this->table}";
        
        if ($order) {
            $sql .= " ORDER BY " .$order;
        }
        // 2- prépare la requette (préformatter)
        $query = $this->pdo->prepare($sql);
        // 3- execute la requette
        $query->execute();
        // 4- on stock le resultat ds une variable
        $items = $query->fetchAll();
        
        return $items;
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
  function get(): array
  {
        $id = $this->getId();
         // 3- requette (query in english) vers BDD
        $sql = "SELECT * FROM jeux WHERE id=:id";
         // 4- préparation de la requette
        $query = $this->pdo->prepare($sql);
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
        /** This function delete an item
    */
  function delete(): void
  {
    $id = $this->getId();
    // 3- requette vers BDD
    $sql = "DELETE FROM jeux WHERE id=?";
    //4- prepare ma requette
    $query = $this->pdo->prepare($sql);
    // 5- on execute le requette
    $query->execute([$id]);
    //redirect
    //6- redirection
    $_SESSION["success"] = "Le jeu es bien supprimer.";
    header("location:index.php");

  }
  function create($name,$price,$note,$description,$genre_clear,$plateforms_clear, $PEGI,$url_img ): void
  {
        $sql = "INSERT INTO jeux(name, price, genre, note, plateforms, description, PEGI, created_at, url_img) VALUES(:name, :price, :genre, :note, :plateforms, :description, :PEGI, NOW(), :url_img)";
        $query = $this->pdo->prepare($sql);
        $query->bindValue(':name', $name, PDO::PARAM_STR);
        $query->bindValue(':price', $price, PDO::PARAM_STMT);
        $query->bindValue(':note', $note, PDO::PARAM_STMT);
        $query->bindValue(':description', $description, PDO::PARAM_STR);
        $query->bindValue(':genre', implode("|", $genre_clear), PDO::PARAM_STR);
        $query->bindValue(':plateforms', implode("|", $plateforms_clear), PDO::PARAM_STR);
        $query->bindValue(':PEGI', $PEGI, PDO::PARAM_STR);
        $query->bindValue(':url_img', $url_img, PDO::PARAM_STR);
        $query->execute();
        
        // 5- redirection
        $_SESSION["success"] = "le jeu a bien été ajouté";
        header("Location: index.php");
        die;
  }
  function update($name, $price, $note, $description, $genre_clear, $plateforms_clear, $PEGI, $url_img)
  {
    $id = $this->getId();
    $sql = "UPDATE jeux SET name = :name, price = :price, genre = :genre, url_img = :url_img, note = :note, plateforms = :plateforms, description = :description, PEGI = :PEGI, updated_at = NOW() WHERE id= :id";
    $query = $this->pdo->prepare($sql);
    $query->bindValue(':id', $id, PDO::PARAM_INT);
    $query->bindValue(':name', $name, PDO::PARAM_STR);
    $query->bindValue(':price', $price, PDO::PARAM_STMT);
    $query->bindValue(':note', $note, PDO::PARAM_STMT);
    $query->bindValue(':description', $description, PDO::PARAM_STR);
    $query->bindValue(':genre', implode("|", $genre_clear), PDO::PARAM_STR);
    $query->bindValue(':url_img', $url_img, PDO::PARAM_STR);
    $query->bindValue(':plateforms', implode("|", $plateforms_clear), PDO::PARAM_STR);
    $query->bindValue(':PEGI', $PEGI, PDO::PARAM_STR);
    $query->execute();

    $_SESSION["success"] = "le jeu a bien été modifié";
    header("Location: index.php");
    die;
  }
}