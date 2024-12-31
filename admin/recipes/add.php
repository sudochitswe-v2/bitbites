<?php
require_once '../../env_loader.php';

use Bb\Blendingbites\Helpers\HTTP;
use Bb\Blendingbites\Helpers\ImageHandler;
use Bb\Blendingbites\Libs\Database\MySQL;
use Bb\Blendingbites\Libs\Database\RecipesTable;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {


    $imagePath = ImageHandler::upload($_FILES);

    $name = $_POST['name'];
    $short_description = $_POST['short_description'];
    $description = $_POST['description'];
    $cuisine = $_POST['cuisine'];
    $difficulty = $_POST['difficulty'];
    $ingredients = $_POST['ingredients_description'];


    $data =  [
        'name' => $name,
        'short_description' => $short_description,
        'description' => $description,
        'image' => $imagePath,
        'difficulty_id' => (int) $difficulty,
        'cuisine_id' => (int) $cuisine,
        'ingredients_description' => $ingredients,
    ];

    try {
        $recipesTable = new RecipesTable(new MySQL());
        $recipesTable->insert($data);
        HTTP::redirect('/admin/recipes');
    } catch (\Throwable $th) {
        echo $th->getMessage();
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recipes</title>
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../css/bootstrap/5.1.3/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/font-awesome/5.10.0/all.min.css">
    <script src="../../js/bootstrap/5.1.3/bootstrap.min.js"></script>
</head>

<body>
    <div class="d-flex vh-100">
        <?php include '_nav.php' ?>
        <main class="container my-5 flex-grow-1 overflow-auto bg-light">
            <?php include '_form.php'; ?>
        </main>
    </div>
</body>

</html>