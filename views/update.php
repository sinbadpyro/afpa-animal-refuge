<?php include "templates/head.php" ?>

<?php
// Connexion à la base de données
$dbh = new PDO('mysql:host=localhost;dbname=refuge', 'root', '');

// Vérification si le formulaire a été soumis
if (isset($_POST['submit'])) {
    
    // Récupération des données du formulaire
    $date_of_birth = $_POST['date_of_birth'];
    $tatoo = isset($_POST['tatoo']) ? 1 : 0;
    $chip = isset($_POST['chip']) ? 1 : 0;
    $sex = $_POST['sex'];
    $name = $_POST['name'];
    $weight = $_POST['weight'];
    $arrival_date = $_POST['arrival_date'];
    $reserved = isset($_POST['reserved']) ? 1 : 0;
    $adoption_date = $_POST['adoption_date'];
    $id_Specie = $_POST['id_Specie'];
    $id_Color = $_POST['id_Color'];
    $id_Breed = $_POST['id_Breed'];
    
    $errors = [];
    if (empty($date_of_birth)) {
        $errors[] = "La date de naissance est obligatoire.";
    } elseif (!preg_match('/^\d{4}-\d{2}-\d{2}$/', $date_of_birth)) {
        $errors[] = "La date de naissance doit être au format AAAA-MM-JJ.";
    }
    if (empty($name)) {
        $errors[] = "Le nom est obligatoire.";
    }
    if (!empty($weight) && !preg_match('/^\d+(?:\.\d+)?\s*(?:kg|lbs)$/', $weight)) {
        $errors[] = "Le poids doit être un nombre suivi de 'kg' ou 'lbs'.";
    }
    if (!empty($adoption_date) && empty($arrival_date)) {
        $errors[] = "La date d'arrivée est obligatoire si une date d'adoption est spécifiée.";
    } elseif (!empty($adoption_date) && !preg_match('/^\d{4}-\d{2}-\d{2}$/', $adoption_date)) {
        $errors[] = "La date d'adoption doit être au format AAAA-MM-JJ.";
    }

    // Affichage des erreurs de validation
    if (!empty($errors)) {
        echo "<ul>";
        foreach ($errors as $error) {
            echo "<li>$error</li>";
        }
        echo "</ul>";
    } else {
        // Ajout d'un nouvel animal à la base de données
        $newAnimal = [
            'date_of_birth' => $date_of_birth,
            'tatoo' => $tatoo,
            'chip' => $chip,
            'sex' => $sex,
            'name' => $name,
            'weight' => $weight,
            'arrival_date' => $arrival_date,
            'reserved' => $reserved,
            'adoption_date' => $adoption_date,
            'id_Specie' => $id_Specie,
            'id_Color' => $id_Color,
            'id_Breed' => $id_Breed,
            'img' => $img,
            'description' => $description

        ];
        $result = Animal::create($newAnimal);
        if ($result) {
            echo "L'animal a été ajouté avec succès à la base de données.";
        } else {
            echo "Une erreur s'est produite lors de l'ajout de l'animal à la base de données.";
        }
        
        
 

    }
    
}

?>


<a class="h1 text-center py-5 bg-dark text-white text-decoration-none" href="../index.php"></i> AFPA ANIMAL REFUGE </i></a>
<h2 class="text-center my-3"></h2>

<div class="row justify-content-center mx-0">
    <div class="col-lg-8 py-3 border rounded shadow custom-color">
        
        <!-- Formulaire d'ajout d'un animal -->
        <div class="container">
            <h2 class="text-center my-3">Mettre à jour un pensionnaire</h2>
            <form method="post" class="form-inline">
                <div class="form-group">
                    <label for="date_of_birth" class="mb-2">Date de naissance:</label>
                    <input type="date" name="date_of_birth" id="date_of_birth" class="form-control" required>
                </div>
                <br>
                <div class="form-check">
                    <input type="checkbox" name="tatoo" id="tatoo" value="1" class="form-check-input">
                    <label for="tatoo" class="form-check-label">Tatoué</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" name="chip" id="chip" value="1" class="form-check-input">
                    <label for="chip" class="form-check-label">Pucé</label>
                </div>
                <br>
                <div class="form-group">
                    <label for="sex" class="mb-2">Sexe:</label>
                    <select name="sex" id="sex" class="form-control">
                        <option value="male">Mâle</option>
                        <option value="female">Femelle</option>
                    </select>
                    <br>
                </div>
                <div class="form-group">
                    <label for="name" class="mb-2">Nom:</label>
                    <input type="text" name="name" id="name" class="form-control" required>
                </div>
                <br>
                <div class="form-group">
                    <label for="weight" class="mb-2">Poids:</label>
                    <input type="text" name="weight" id="weight" class="form-control">
                </div>
                <br>
                <div class="form-group">
                    <label for="arrival_date" class="mb-2">Date d'arrivée:</label>
                    <input type="date" name="arrival_date" id="arrival_date" class="form-control">
                </div>
                <br>
                <div class="form-check">
                    <input type="checkbox" name="reserved" id="reserved" value="1" class="form-check-input">
                    <label for="reserved" class="form-check-label">Réservé</label>
                </div>
                <br>
                <div class="form-group">
                    <label for="adoption_date" class="mb-2">Date d'adoption:</label>
                    <input type="date" name="adoption_date" id="adoption_date" class="form-control">
                </div>
                <br>
                <div class="form-group">
                    <label for="id_Specie" class="mb-2">Espèce:</label>
                    <select name="id_Specie" id="id_Specie" class="form-control">
                        <?php
                        // Récupération des espèces de la base de données
                        $stmt = $dbh->prepare("SELECT id, name FROM specie");
                        $stmt->execute();
                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            echo "<option value=\"" . $row['id'] . "\">" . $row['name'] . "</option>";
                        }
                        ?>
                    </select>
                </div>
                <br>
                <div class="form-group">
                    <label for="id_Color" class="mb-2">Couleur:</label>
                    <select name="id_Color" id="id_Color" class="form-control">
                        <?php
                        // Récupération des couleurs de la base de données
                        $stmt = $dbh->prepare("SELECT id, name FROM color");
                        $stmt->execute();
                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            echo "<option value=\"" . $row['id'] . "\">" . $row['name'] . "</option>";
                        }
                        ?>
                    </select>
                </div>
                <br>
                <div class="form-group">
                    <label for="id_Breed" class="mb-2">Race:</label>
                    <select name="id_Breed" id="id_Breed" class="form-control">
                        <?php
                        // Récupération des races de la base de données
                        $stmt = $dbh->prepare("SELECT id, name FROM breed");
                        $stmt->execute();
                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            echo "<option value=\"" . $row['id'] . "\">" . $row['name'] . "</option>";
                        }
                        ?>
                    </select>
                    <br>
                </div>
               
                <br>
                
                <div class="d-flex justify-content-center">
                    <input type="submit" name="submit" value="Mettre à jour" class="btn btn-secondary btn-lg">
                    <a href="../controllers/controller-accueil.php" class="link-primary mt-2 ms-3 me-3">Annuler</a>
                </div>
            </form>


        </div>
    </div>

    <div class="row flex-column align-items-center mx-0 py-2">
        <a class="btn btn-dark col-lg-2 col-8 my-2" href="../controllers/controller-accueil.php">Accueil</a>
        <a class="btn btn-dark col-lg-2 col-8 my-2" href="../controllers/controller-add.php">Ajouter un pensionnaire</a>
        <a class="btn btn-dark col-lg-2 col-8 my-2" href="../controllers/controller-manage.php">Gérér les pensionnaires</a>
    </div>

    <?php include "templates/footer.php" ?>