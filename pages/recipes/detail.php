<?php
include '../../env_loader.php';

use Bb\Blendingbites\Libs\Database\MySQL;
use Bb\Blendingbites\Libs\Database\RecipesTable;

$id = $_GET['id'];
$recipeTable = new RecipesTable(new MySQL());
$recipe = $recipeTable->getById($id);
?>
<!DOCTYPE html>
<html lang="en">
<header>
    <?php include '../../_layout/nav_bar.php' ?>
</header>


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recipe Details</title>
    <link rel="stylesheet" href="../../public/css/style.css">
    <link rel="stylesheet" href="../../public/css/bootstrap/5.1.3/bootstrap.min.css">
    <link rel="stylesheet" href="../../public/css/font-awesome/5.10.0/all.min.css">
    <script src="../js/bootstrap/5.1.3/bootstrap.min.js"></script>

</head>

<body>
    <div class="container py-5">
        <div class="row">

            <div class="col-md-6">

                <div class="text-center mb-4">
                    <img src="<?= $_ENV['BASE_PATH'] . '/' . htmlspecialchars($recipe['image']) ?>" alt="Food Image" class="img-fluid rounded detail-img">
                    <h3 class="mt-3"><?= $recipe['name'] ?></h3>
                </div>
                <!-- Ingredients Section -->
                <div>
                    <h4>Ingredients</h4>
                    <?= $recipe['ingredients_description'] ?>
                </div>
            </div>


            <div class="col-md-6">

                <div class="mb-4">
                    <p><strong>Difficulty Level:</strong> <?= $recipe['difficulty']['name'] ?></p>
                    <p><strong>Cuisine Type:</strong> <?= $recipe['cuisine']['name'] ?></p>
                    <p><strong>Posted By:</strong> Chef John</p>
                </div>
                <div>
                    <h4>Description</h4>
                    <p>
                        <?= $recipe['description'] ?>
                    </p>
                </div>
            </div>
        </div>

        <!-- Back to Recipes Button -->
        <div class="text-end mt-5">
            <a href="recipes.php" class="btn btn-outline-primary d-inline-flex align-items-center text-black">
                <i class="fa fa-arrow-left me-2"></i> Back to Recipes
            </a>
        </div>
    </div>

    <?php include '../_layout/footer.php' ?>
</body>

</html>