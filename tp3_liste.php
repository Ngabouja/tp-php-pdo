<!--
  TP 3 – LISTER LES JEUX DANS UN TABLEAU HTML

  Afficher tous les jeux dans le tableau ci-dessous, une ligne par jeu.
  La note s'affiche sur 20 : 18/20
-->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>TP 3 - Liste des jeux</title>
</head>
<body>
    <h1>Liste des jeux</h1>

    <table border="1">
        <tr><th>Titre</th><th>Genre</th><th>Année</th><th>Note</th></tr>
        <?php

     require("connexion.php");
        $resultat = $base->query('SELECT titre, genre, annee, note FROM jeu');
        while ($donnees = $resultat->fetch()) {
        ?>
            <tr>
                <th><?php echo $donnees['titre']; ?></th>
                <th><?php echo $donnees['genre']; ?></th>
                <th><?php echo $donnees['annee']; ?></th>
                <th><?php echo $donnees['note'] . "/20"; ?></th>


            </tr>
            <?php }
        ?>
    </table>
</body>
</html>
