<?php
// Je définis les constantes de connexion à la base de données
require_once "../config.php";

// j'appelle le fichier helpers/Database.php
require_once "../helpers/Database.php";

// j'appelle le model animal.php
require_once "../models/Animal.php";

//j'appelle le model breed.php
require_once "../models/Breed.php";

//j'appelle le model color.php
require_once "../models/Color.php";

//j'appelle le model species.php
require_once "../models/Specie.php";

// j'inclus la vue addAnimal.php
include "../views/add.php";
