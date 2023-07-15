<?php include "templates/head.php" ?>

<a class="h1 text-center py-5 bg-dark text-white text-decoration-none" href="../index.php"></i> AFPA ANIMAL REFUGE </i></a>
<h2 class="text-center my-3"></h2>
<h3 class="text-center my-3">Refuge Afpa des abandonnés</h3>


<div class="container">
  <div class="row justify-content-center">

    <?php
    foreach (Animal::getAll() as $animal) {


    ?>

      <div class="card me-3 mb-3" style="max-width: 540px;">
        <div class="row g-0">
          <div class="col-md-4">
            <a href="../controllers/controller-details.php?id=<?= $animal['id'] ?>"><img src="<?= $animal['img'] ?>" class="img-fluid rounded-start" alt="image animaux"></a>
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h5 class="card-title"><strong> <?= $animal['name'] ?> </strong> </h5>
              <p class="card-title"><strong> <?= $animal['id'] ?> </strong> </p>
              <p class="card-text"> <?= $animal['description'] ?> </p>
            </div>
          </div>
        </div>
      </div>
        <?php } ?>
  </div>
</div>






      <?php include "templates/footer.php" ?>