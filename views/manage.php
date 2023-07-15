<?php include "templates/head.php" ?>

<?php

// Connexion à la base de données
$dbh = new PDO('mysql:host=localhost;dbname=refuge', 'root', '');

    // Requête SQL pour récupérer les données des animaux
    $stmt = $dbh->query('SELECT * FROM animal');
    $animals = $stmt->fetchAll();
    
?>



<a class="h1 text-center py-5 bg-dark text-white text-decoration-none" href="../index.php"></i> AFPA ANIMAL REFUGE </i></a>
<h2 class="text-center my-3">Gérer les pensionnaires</h2>

<div class="row justify-content-center mx-0">
    <div class="col-lg-8 py-3 shadow border">

    <table class="table table-striped text-center">
        <tr>
            <th class="text-center">ID</th>
            <th class="text-center">Nom</th>
            <th class="text-center">Espèce</th>
            <th class="text-center">Race</th>
            <th class="text-center">Couleur</th>
            <th class="text-center">Actions</th>
        </tr>
    
        <?php foreach ($animals as $animal): ?>
        <tr>
            <td><?php echo $animal['id']; ?></td>
            <td><?php echo $animal['name']; ?></td>
            <td><?php // Récupération du nom de l'espèce
                $stmt = $dbh->prepare("SELECT name FROM specie WHERE id = :id");
                $stmt->execute([':id' => $animal['id_Specie']]);
                echo $stmt->fetchColumn();
            ?></td>
            <td><?php // Récupération du nom de la race
                $stmt = $dbh->prepare("SELECT name FROM breed WHERE id = :id");
                $stmt->execute([':id' => $animal['id_Breed']]);
                echo $stmt->fetchColumn();
            ?></td>
            <td><?php // Récupération du nom de la couleur
                $stmt = $dbh->prepare("SELECT name FROM color WHERE id = :id");
                $stmt->execute([':id' => $animal['id_Color']]);
                echo $stmt->fetchColumn();
            ?></td>
            <td>
                <a class="btn btn-primary" href="../views/update.php?id=<?php echo $animal['id']; ?>">Modifier</a> 
                <a class="btn btn-primary" href="delete_animal.php?id=<?php echo $animal['id']; ?>">Supprimer</a> 
                <a class="btn btn-primary" href="view_animal.php?id=<?php echo $animal['id']; ?>">+ infos</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>

    </div>
</div>

<div class="row flex-column align-items-center mx-0 py-2">
    <a class="btn btn-dark col-lg-2 col-8 my-2" href="../controllers/controller-accueil.php">Accueil</a>
    <a class="btn btn-dark col-lg-2 col-8 my-2" href="../controllers/controller-add.php">Ajouter un pensionnaire</a>
</div>

<?php include "templates/footer.php" ?>