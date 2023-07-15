<?php include "templates/head.php" ?>

<a class="h1 text-center py-5 bg-dark text-white text-decoration-none" href="../index.php"></i> AFPA ANIMAL REFUGE </i></a>
<h2 class="text-center my-3">Détails</h2>




<div class="row justify-content-center">
    <?php
    foreach (Animal::getAnimalId() as $animal) { ?>


        <div class="card mb-5" style="max-width: 1000px;">
            <div class="row g-0">
                <div class="col-md-4 mt-5">
                    <a href="../controllers/controller-details.php?id=<?= $animal['id'] ?>"><img src="<?= $animal['img'] ?>" class="img-fluid rounded-start" alt="image animaux"></a>
                </div>
                <div class="col-md-8">
                    <div class="card-body ms-3 mt-0">
                        <h5 class="card-title mt-4 mb-4"><strong> Nom : </strong> <?= $animal['name'] ?> </h5>
                        <p class="card-text"><strong> ID : </strong> <?= $animal['id'] ?> </p>
                        <p class="card-text"><strong> Date de naissance : </strong> <?= $animal['date_of_birth'] ?> </p>
                        <p class="card-text"><strong> Tatoué : </strong> <?= $animal['tatoo'] ?> </p>
                        <p class="card-text"><strong> Pucé : </strong> <?= $animal['chip'] ?> </p>
                        <p class="card-text"><strong> Sexe : </strong> <?= $animal['sex'] ?> </p>
                        <p class="card-text"><strong> Poids : </strong> <?= $animal['weight'] ?> </p>
                        <p class="card-text"><strong> Date d'arrivée : </strong> <?= $animal['arrival_date'] ?> </p>
                        <p class="card-text"><strong> Réservé : </strong> <?= $animal['reserved'] ?> </p>
                        <p class="card-text"><strong> Date d'adoption : </strong> <?= $animal['adoption_date'] ?> </p>
                        <p class="card-text"><strong> ID Espèce : </strong> <?= $animal['id_Specie'] ?> </p>
                        <p class="card-text"><strong> ID Couleur: </strong> <?= $animal['id_Color'] ?> </p>
                        <p class="card-text"><strong> ID Race: </strong> <?= $animal['id_Breed'] ?> </p>
                        <p class="card-text"><strong> Description : </strong> <?= $animal['description'] ?> </p>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
    <div class="row flex-column align-items-center mx-0 py-2">
    <a class="btn btn-dark col-lg-2 col-8 my-2" href="../controllers/controller-accueil.php">Accueil</a>
    <a class="btn btn-dark col-lg-2 col-8 my-2" href="../controllers/controller-add.php">Ajouter un pensionnaire</a>
    <a class="btn btn-dark col-lg-2 col-8 my-2" href="../controllers/controller-manage.php">Gérér les pensionnaires</a>
</div>
</div>







<?php include "templates/footer.php" ?>