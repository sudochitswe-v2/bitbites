<!DOCTYPE html>
<html lang="en">

<header>
    <?php

    use Bb\Blendingbites\Libs\Database\MySQL;
    use Bb\Blendingbites\Libs\Database\RecipesTable;

    include '_nav.php';
    ?>
</header>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recipe_Collection</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/bootstrap/5.1.3/bootstrap.min.css">
    <link rel="stylesheet" href="../css/font-awesome/5.10.0/all.min.css">
    <script src="../js/boostrap/5.1.3/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

</head>
<style>
    .input-group .form-control:hover,
    .input-group .form-control:focus {
        box-shadow: none;
        border-color: rgb(0, 0, 0);
    }

    .input-group .btn:hover,
    .input-group .btn:focus {
        box-shadow: none;
        background-color: transparent;
        border-color: rgb(0, 0, 0);
        color: inherit;
        cursor: pointer;
    }

    .card-img-top {
        width: 100%;
        height: 300px;
        object-fit: cover;
    }
</style>
<?php
include '../env_loader.php';

use Bb\Blendingbites\Libs\Database;

$recipesTable = new RecipesTable(new MySQL());
$recipes = $recipesTable->getAll();
?>

<body>
    <!-- Welcome Section -->
    <section class="welcome-section position-relative text-center">
        <div class="welcome-content">
            <h1>Welcome to Our Recipe Collection</h1>
            <p class="lead">Discover diverse flavors from around the world and create unforgettable meals. Let’s explore!</p>
        </div>
    </section>

    <!-- Search Section -->
    <section class="py-5">
        <div class="container text-center">
            <h2 class="mb-4">Find Your Favorite Recipes</h2>
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="input-group">
                        <button class="btn btn-outline-secondary" type="button" id="search-button">
                            <i class="fa fa-search"></i>
                        </button>
                        <input type="text" class="form-control" placeholder="Search for recipes..." aria-label="Search">
                    </div>
                </div>
                <div class="col-md-auto">
                    <div class="dropdown">
                        <button class="btn btn-outline-dark dropdown-toggle" type="button" id="spicyDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            Cuisine
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="spicyDropdown">
                            <li><a class="dropdown-item" href="#">Asian</a></li>
                            <li><a class="dropdown-item" href="#">Western</a></li>
                            <li><a class="dropdown-item" href="#">European</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-auto">
                    <div class="dropdown">
                        <button class="btn btn-outline-dark dropdown-toggle" type="button" id="drinksDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            Difficulities Level
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="drinksDropdown">
                            <li><a class="dropdown-item" href="#">Easy</a></li>
                            <li><a class="dropdown-item" href="#">Medium</a></li>
                            <li><a class="dropdown-item" href="#">Hard</a></li>
                            <li><a class="dropdown-item" href="#">Challenging</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Recipe List Section -->
    <section class="py-5">
        <div class="container">
            <h2 class="text-center mb-4">Our Recipes</h2>
            <div class="row gy-4">
                <?php foreach ($recipes as $recipe): ?>
                    <div class="col-md-6">
                        <div class="card h-100">
                            <img src="<?= htmlspecialchars($recipe['image']) ?>" class="card-img-top" alt="Recipe Photo 1">
                            <div class="card-body d-flex flex-column justify-content-between">
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="fw-bold"><?= htmlspecialchars($recipe['name']) ?></span>
                                    <div class="d-flex align-items-center">
                                        <i class="bi bi-heart text-danger me-1 heart-icon" onclick="increaseLikes(this)"></i>
                                        <span class="like-count"><?= htmlspecialchars(count($recipe['liked_user_ids'])) ?></span>
                                    </div>
                                    <span class="text-muted"><?= htmlspecialchars($recipe['difficulty']['name']) ?></span>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <?php
                                    for ($i = 1; $i <= $recipe['difficulty']['value']; $i++) {
                                        echo '<i class="col-xs fa fa-star text-warning"></i>';
                                    }
                                    ?>
                                </div>
                                <p class="text-muted mb-0"><?= htmlspecialchars($recipe['cuisine']['name']) ?></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
    </section>
    <?php include '../_layout/footer.php' ?>
</body>

<!-- Bootstrap Bundle JS and Bootstrap Icons -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<!-- JavaScript for Like Counter -->
<script>
    function increaseLikes(heart) {
        let likeCount = heart.nextElementSibling;
        let count = parseInt(likeCount.innerText);
        count += 1;
        likeCount.innerText = count;

        heart.classList.remove('bi-heart');
        heart.classList.add('bi-heart-fill');
    }
</script>

</html>