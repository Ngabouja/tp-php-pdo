<?php

  require("connexion.php");

  $base->exec("INSERT INTO jeu (titre, genre, annee, note) VALUES ('Pac-Man', 'Action', 1980, 16)");
  $id = $base->lastInsertId();
  echo "Pac-Man ajouté avec l'id " . $id . "<br>";

  $nbModifies = $base->exec("UPDATE jeu SET note = 15 WHERE titre = 'Fortnite'");
  echo "Nombre de jeux modifiés : " . $nbModifies . "<br>";

  $nbSupprimes = $base->exec("DELETE FROM jeu WHERE titre = 'Pac-Man'");
  echo "Nombre de jeux supprimés : " . $nbSupprimes . "<br>";



?>


<!-- /*
  TP 5 – AJOUTER, MODIFIER, SUPPRIMER AVEC exec()

  1. Ajouter le jeu Pac-Man (genre Action, année 1980, note 16)
     puis afficher : Pac-Man ajouté avec l'id ...
  2. Passer la note de Fortnite à 15
     puis afficher le nombre de jeux modifiés.
  3. Supprimer Pac-Man
     puis afficher le nombre de jeux supprimés.

  Vérifier le résultat avec la page du TP 3.

  Question : que se passerait-il avec DELETE FROM jeu sans WHERE ?
  Réponse :
*/ -->
