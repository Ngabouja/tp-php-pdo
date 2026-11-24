<!--
  TP 8 – MODIFIER ET SUPPRIMER

  1. Formulaire « Modifier » : changer la note du jeu qui a cet id.
     Afficher « Note modifiée. » ou « Aucun jeu modifié. »
  2. Formulaire « Supprimer » : supprimer le jeu qui a cet id.
     Afficher « Jeu supprimé. » ou « Aucun jeu supprimé. »
  3. En bas de page, afficher la liste des jeux, à jour : 1 - Minecraft (18/20)

  Utiliser des requêtes préparées.
  Test : essayer de modifier le jeu avec l'id 999.
-->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>TP 8 - Modifier et supprimer</title>
</head>
<body>
<?php

    require("connexion.php");

    if (isset($_POST['id_modif'], $_POST['note'])) {
        $sql = "UPDATE jeu SET note = :note WHERE id = :id";
        $stmt = $base->prepare($sql);
        $stmt->execute([
            'note' => $_POST['note'],
            'id'   => $_POST['id_modif']
        ]);

        if ($stmt->rowCount() > 0) {
            echo "<p>Note modifiée.</p>";
        } else {
            echo "<p>Aucun jeu modifié.</p>";
        }
    }

    if (isset($_POST['id_suppr'])) {
        $sql = "DELETE FROM jeu WHERE id = :id";
        $stmt = $base->prepare($sql);
        $stmt->execute([
            'id' => $_POST['id_suppr']
        ]);

        if ($stmt->rowCount() > 0) {
            echo "<p>Jeu supprimé.</p>";
        } else {
            echo "<p>Aucun jeu supprimé.</p>";
        }
    }    


?>

    <h2>Modifier une note</h2>
    <form method="post">
        Id : <input type="number" name="id_modif" required>
        Nouvelle note : <input type="number" name="note" min="0" max="20" required>
        <button type="submit">Modifier</button>
    </form>

    <h2>Supprimer un jeu</h2>
    <form method="post">
        Id : <input type="number" name="id_suppr" required>
        <button type="submit">Supprimer</button>
    </form>

    <h2>Liste des jeux</h2>
     <table border="1">
        <tr><th>Titre</th><th>Genre</th><th>Année</th><th>Note</th></tr>
        <?php

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
