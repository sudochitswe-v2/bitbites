<!DOCTYPE html>
<html lang="en">


<?php
session_start();
include '../../env_loader.php';

use Bb\Blendingbites\Helpers\Auth;
use Bb\Blendingbites\Helpers\HTTP;
use Bb\Blendingbites\Libs\Database\CuisinesTable;
use Bb\Blendingbites\Libs\Database\DifficultiesTable;
use Bb\Blendingbites\Libs\Database\MySQL;
use Bb\Blendingbites\Libs\Database\RecipesTable;

$connection = new MySQL();

$recipesTable = new RecipesTable($connection);
$difficultiesTable = new DifficultiesTable($connection);
$cuisinesTable = new CuisinesTable($connection);

$difficulties = $difficultiesTable->getAll();
$cuisines = $cuisinesTable->getAll();
$recipes = $recipesTable->getAll();

?>


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recipe_Collection</title>
    <link rel="stylesheet" href="../../public/css/style.css">
    <link rel="shortcut icon" href="../../public/images/favico.png" type="image/png">
    <link rel="stylesheet" href="../../public/css/bootstrap/5.1.3/bootstrap.min.css">
    <link rel="stylesheet" href="../../public/css/font-awesome/5.10.0/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="../../public/js/bootstrap/5.1.3/bootstrap.bundle.min.js"></script>
</head>
<header>
    <?php include '../../_layout/nav_bar.php'; ?>
</header>
<style>
    body {
        background-color: rgb(210, 201, 201);
    }

    .form-select:hover,
    .form-select:focus {
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

<body style="background: var(--primary);">
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
                    <form id="search" method="POST" action="_search.php">

                        <div class="input-group">
                            <button class="btn btn-outline-secondary" type="submit" id="search-button">
                                <i class="fa fa-search"></i>
                            </button>
                            <input type="text" id="searchInput" name="name" class="form-control" placeholder="Search for recipes..." aria-label="Search">


                        </div>
                    </form>
                </div>
                <!-- Cuisine Filter -->
                <div class="col-md-auto">
                    <select class="form-select" id="cuisineFilter" methos="POST" action="_search.php">
                        <option value="">All Cuisines</option>
                        <?php foreach ($cuisines as $cuisine) : ?>
                            <option value="<?= $cuisine['name'] ?>"><?= htmlspecialchars($cuisine['name']) ?></option>
                        <?php endforeach   ?>
                    </select>
                </div>

                <!-- Difficulty Filter -->
                <div class="col-md-auto">
                    <select class="form-select" id="difficultyFilter" method="POST" action="_search.php">
                        <option value="">All Difficulty Levels</option>
                        <?php foreach ($difficulties as $difficulty) : ?>
                            <option value="<?= $difficulty['name'] ?>"><?= htmlspecialchars($difficulty['name']) ?></option>
                        <?php endforeach ?>

                    </select>
                </div>

            </div>
        </div>
    </section>

    <!-- Recipe List Section -->
    <section class="py-5">
        <div class="container">
            <h2 class="text-center mb-4">Our Recipes</h2>
            <div id="recipesGrid" class="row gy-4">
                <?php foreach ($recipes as $recipe): ?>
                    <div class="col-md-6">
                        <div id="recipe-item-<?= $recipe['id'] ?>">
                            <?php include '_recipe_item.php' ?>
                        </div>

                    </div>
                <?php endforeach ?>
            </div>
        </div>
    </section>
    <?php include '../../_layout/footer.php' ?>
</body>

<script>
    $(document).ready(function() {
        function applyFilters() {
            let search = $('#searchInput').val();
            let cuisine = $('#cuisineFilter').val();
            let difficulty = $('#difficultyFilter').val();

            $.ajax({
                url: '_search.php',
                type: 'POST',
                data: {
                    search: search,
                    cuisine: cuisine,
                    difficulty: difficulty
                },
                success: function(response) {
                    $('#recipesGrid').html(response);
                }
            });
        }

        function like(recipeId, userId, action) {
            $.ajax({
                url: '_fav.php',
                type: 'POST',
                data: {
                    recipe_id: recipeId,
                    user_id: userId,
                    action: action
                },
                success: function(response) {
                    // Reload the specific recipe item dynamically
                    $(`#recipe-item-${recipeId}`).html(response);
                }
            });
        }

        // Event delegation for like/dislike buttons
        $(document).on('click', '.like-btn', function() {
            let recipeId = $(this).data('recipe-id');
            let userId = $(this).data('user-id');
            like(recipeId, userId, "like");
        });

        $(document).on('click', '.dislike-btn', function() {
            let recipeId = $(this).data('recipe-id');
            let userId = $(this).data('user-id');
            like(recipeId, userId, "dislike");
        });

        // Live filter updates
        $('#searchInput, #cuisineFilter, #difficultyFilter').on('change keyup', function() {
            applyFilters();
        });
    });
</script>

</html>