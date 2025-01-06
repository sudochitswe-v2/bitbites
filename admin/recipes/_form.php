<?php

use Bb\Blendingbites\Libs\Database\CuisinesTable;
use Bb\Blendingbites\Libs\Database\DifficultiesTable;
use Bb\Blendingbites\Libs\Database\MySQL;

$connection = new MySQL();
$difficultiesTable = new DifficultiesTable($connection);
$cuisinesTable = new CuisinesTable($connection);

$difficulties = $difficultiesTable->getAll();
$cuisines = $cuisinesTable->getAll();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title><?= isset($recipe) ? 'Edit Recipe' : 'Add Recipe' ?></title>
    <link rel="stylesheet" href="../../public/css/bootstrap/5.1.3/bootstrap.min.css">
    <script src="../../public/js/helper/image-preview.js"></script>
    <script src="../../public/js/bootstrap/5.1.3/bootstrap.min.js"></script>
    <script src="https://cdn.tiny.cloud/1/drmgz8wp6e6ll3e4f504h121zztu7gvvltimxaw5y4thr62r/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: 'textarea#ingredients_description',
            plugins: 'lists',
            toolbar: 'numlist bullist'
        });
    </script>
</head>
<style>
    .image-preview-container {
        position: relative;
        height: 250px;
    }

    .image-preview {
        width: 100%;
        height: 100%;
        border: 2px dashed #ccc;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        background-size: cover;
        background-position: center;
        background-color: #f9f9f9;
    }

    .image-preview span {
        color: #888;
    }
</style>

<body>
    <div class="container ">
        <form method="POST" enctype="multipart/form-data">
            <?php if (isset($recipe)): ?>
                <input type="hidden" name="id" value="<?= $recipe['id'] ?>">
                <input type="hidden" name="oldImage" value="<?= $recipe['image'] ?>">
            <?php endif ?>

            <div class="row">
                <div class="col-md-4">
                    <div class="image-preview-container">
                        <label for="image" class="image-preview" <?php if (isset($recipe)) echo 'style="background-image: url(\'' . $_ENV['BASE_PATH'] . '/' .  htmlspecialchars($recipe['image']) . '\'); : ""' ?> id='imagePreview'>
                            <span><?= isset($recipe) ? '' : 'Click to Upload Image' ?></span>
                        </label>
                        <div>
                            <input
                                type="file"
                                id="image"
                                name="image"
                                class="form-control"
                                accept="image/*"
                                <?= isset($recipe) ? '' : 'required' ?>
                                onchange="previewImage(event)"
                                style="display: none;">
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="mb-1">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="<?= $recipe['name'] ?? '' ?>" required>
                    </div>
                    <div class="mb-1">
                        <label for="difficulty" class="form-label">Difficulty</label>
                        <select class="form-select" id="difficulty" name="difficulty" required>
                            <option value="" disabled selected>Select Difficulty</option>
                            <?php foreach ($difficulties as $difficulty): ?>
                                <option value="<?= $difficulty['id'] ?>" <?= isset($recipe) && $recipe['difficulty_id'] == $difficulty['id'] ? 'selected' : '' ?>><?= $difficulty['name'] ?></option>
                                <?php endforeach ?>;
                        </select>
                    </div>
                    <div class="mb-1">
                        <label for="cuisine" class="form-label">Cuisine</label>
                        <select class="form-select" id="cuisine" name="cuisine" required>
                            <option value="" disabled selected>Select Cuisine</option>
                            <?php foreach ($cuisines as $cuisine): ?>
                                <option value="<?= $cuisine['id'] ?>" <?= isset($recipe) && $recipe['cuisine_id'] == $cuisine['id'] ? 'selected' : '' ?>><?= $cuisine['name'] ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                </div>
            </div>

            <!-- <div>
                <label for="dietary_preferences" class="form-label">Dietary Preferences</label>
                <select class="form-select" id="dietary_preferences" name="dietary_preferences[]" multiple required>
                    <option value="Vegetarian" <?= isset($recipe) && in_array('Vegetarian', $recipe['dietary_preferences'] ?? []) ? 'selected' : '' ?>>Vegetarian</option>
                    <option value="Vegan" <?= isset($recipe) && in_array('Vegan', $recipe['dietary_preferences'] ?? []) ? 'selected' : '' ?>>Vegan</option>
                    <option value="Gluten-Free" <?= isset($recipe) && in_array('Gluten-Free', $recipe['dietary_preferences'] ?? []) ? 'selected' : '' ?>>Gluten-Free</option>
                    <option value="Dairy-Free" <?= isset($recipe) && in_array('Dairy-Free', $recipe['dietary_preferences'] ?? []) ? 'selected' : '' ?>>Dairy-Free</option>
                </select>
            </div> -->

            <div class="mb-1">
                <label for="short_description" class="form-label">Short Description</label>
                <input type="text" class="form-control" id="short_description" name="short_description" value="<?= $recipe['short_description'] ?? '' ?>" required>
            </div>

            <div class="mb-1">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" rows="5" required><?= $recipe['description'] ?? '' ?></textarea>
            </div>
            <div class="mb-1">
                <label for="description" class="form-label">Ingredients</label>
                <textarea class="form-control" id="ingredients_description" name="ingredients_description" rows="5" required>
                <?= $recipe['ingredients_description'] ?? '' ?>
                </textarea>
            </div>

            <div>
                <button type="submit" class="btn btn-success"><?= isset($recipe) ? 'Update Recipe' : 'Add Recipe' ?></button>
            </div>
        </form>
    </div>
</body>

</html>