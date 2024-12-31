<?php
require_once '../../env_loader.php';

use Bb\Blendingbites\Helpers\HTTP;
use Bb\Blendingbites\Helpers\ImageHandler;
use Bb\Blendingbites\Libs\Database\MySQL;
use Bb\Blendingbites\Libs\Database\RecipesTable;

$id = $_GET['id'];
$recipesTable  = new RecipesTable(new MySQL());
$recipe = $recipesTable->getById($id);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $id = $_POST['id'];
    $name = $_POST['name'];
    $oldImage = $_POST['oldImage'];
    $short_description = $_POST['short_description'];
    $description = $_POST['description'];
    $cuisine = $_POST['cuisine'];
    $difficulty = $_POST['difficulty'];
    $ingredients = $_POST['ingredients_description'];


    $data =  [
        'id' => $id,
        'name' => $name,
        'short_description' => $short_description,
        'description' => $description,
        'difficulty_id' => (int) $difficulty,
        'image' => $oldImage,
        'cuisine_id' => (int) $cuisine,
        'ingredients_description' => $ingredients,
    ];
    print_r($_FILES);
    if ($_FILES['image']['size'] != 0) {
        $data['image'] = ImageHandler::upload($_FILES);
    }

    var_dump($data);
    try {
        $recipesTable->update($data);
        HTTP::redirect('/admin/recipes');
        exit();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
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