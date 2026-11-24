<!--
  TP 6 – RECHERCHE PAR GENRE AVEC UNE REQUÊTE PRÉPARÉE

  Quand l'utilisateur choisit un genre et valide :
  1. Afficher le nombre de jeux trouvés : 2 jeu(x) trouvé(s) :
  2. Afficher chaque jeu de ce genre : Mario Kart 8 : 17/20
  La recherche doit utiliser une requête préparée.

  Test : taper dans l'URL  ?genre=x' OR '1'='1
  Que se passe-t-il ? Pourquoi ?
-->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>TP 6 - Recherche par genre</title>
</head>
<body>

    <form method="get">
        <select name="genre">
            <option>Action</option>
            <option>Aventure</option>
            <option>Course</option>
            <option>Réflexion</option>
            <option>Sport</option>
        </select>
        <button type="submit">Rechercher</button>
    </form>

<?php
    require("connexion.php");

    if (isset($_GET['genre'])) {
        $sql = "SELECT titre, note FROM jeu WHERE genre = :genre";
        $stmt = $base->prepare($sql);

        $stmt->execute([
            'genre' => $_GET['genre']
        ]);

        $jeux = $stmt->fetchAll(PDO::FETCH_ASSOC);

        echo "<p>" . count($jeux) . " jeu(x) trouvé(s) :</p>";

        echo "<ul>";
        foreach ($jeux as $jeu) {
            echo "<li>" . htmlspecialchars($jeu['titre']) . " : " . htmlspecialchars($jeu['note']) . "/20</li>";
        }
        echo "</ul>";
    }
?>
</body>
</html>
