<?php

use Bb\Blendingbites\Libs\Database\MySQL;
use Bb\Blendingbites\Libs\Database\RecipesTable;

require '../../env_loader.php';

$recipes = new RecipesTable(new MySQL());
$allRecipes = $recipes->getAll();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recipes</title>
    <link rel="stylesheet" href="../../public/css/style.css">
    <link rel="stylesheet" href="../../public/css/bootstrap/5.1.3/bootstrap.min.css">
    <link rel="stylesheet" href="../../public/css/font-awesome/5.10.0/all.min.css">
    <script src="../public/js/bootstrap/5.1.3/bootstrap.min.js"></script>
</head>

<body>
    <div class="d-flex vh-100">
        <?php include '../_shared/_nav.php' ?>
        <main class="container my-2 flex-grow-1 overflow-auto bg-light">

            <div class="d-flex sticky-top justify-content-between align-items-center mb-4 bg-light">
                <h1 class="text-primary">Recipes</h1>
                <a href="add.php" class="btn btn-info mb-3">Add New Recipe</a>
            </div>
            <div class="row">
                <div class="col">
                    <?php foreach ($allRecipes as $recipe): ?>
                        <div class="card border rounded p-3 shadow-sm mb-3">
                            <div class="row g-2">
                                <div class="col-4">
                                    <img src="<?= $_ENV['BASE_PATH'] . '/' . htmlspecialchars($recipe['image']) ?>" alt="Recipe Image" class="img-fluid rounded" style="height: 120px; object-fit: cover;">
                                </div>
                                <div class="col-8">
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <p class="fw-bold mb-0">
                                            <?= htmlspecialchars($recipe['name']) ?>
                                        </p>

                                        <!-- Edit and Delete Buttons -->
                                        <div class="d-flex gap-2">
                                            <a href="edit.php?id=<?= $recipe['id'] ?>" class="btn btn-warning btn-sm rounded-circle" style="width: 30px; height: 30px;">
                                                <i class="far fa-edit"></i>
                                            </a>
                                            <a href="delete.php?id=<?= $recipe['id'] ?>" class="btn btn-danger btn-sm rounded-circle" style="width: 30px; height: 30px;">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="d-flex gap-2 mb-2">
                                        <div class="badge bg-primary"><?= htmlspecialchars($recipe['cuisine']['name']) ?>
                                        </div>
                                        <div class="badge bg-primary"><?= htmlspecialchars($recipe['difficulty']['name']) ?></div>
                                    </div>
                                    <div class="d-flex flex-wrap gap-1">
                                        <?php foreach ($recipe['dietary_preferences'] as $preferences): ?>
                                            <div class="badge bg-success"><?= htmlspecialchars($preferences['name']) ?></div>
                                        <?php endforeach ?>
                                    </div>

                                    <div class="d-flex align-items-center">
                                        <i class="fas fa-heart text-warning me-1"></i>
                                        <span><?= htmlspecialchars(count($recipe['liked_user_ids'])) ?></span>
                                    </div>

                                    <p class="text-muted mt-2 mb-0"><?= htmlspecialchars($recipe['short_description']) ?></p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </main>
    </div>
</body>

</html>