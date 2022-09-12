<?php

if (!empty($genre_clear)) {
    if (in_array("Aventure", $genre_clear) || in_array("RPG", $genre_clear) || in_array("FPS", $genre_clear) || in_array("Fantasy", $genre_clear)) {
    } else {
        $error["error"] = "<span class=text-red-500>c'est bizarre , ces valeurs n'existent pas</span>";
    }
} else {
    $error["genre"] = $errorMessage;
}
