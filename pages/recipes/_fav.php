<?php
session_start();
require_once '../../env_loader.php';

use Bb\Blendingbites\Helpers\Auth;
use Bb\Blendingbites\Helpers\HTTP;
use Bb\Blendingbites\Libs\Database\FavoritesTable;
use Bb\Blendingbites\Libs\Database\MySQL;
use Bb\Blendingbites\Libs\Database\RecipesTable;


$connection =  new MySQL();
$recipesTable = new RecipesTable($connection);
$favoritesTable = new FavoritesTable($connection);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $recipe_id = $_POST['recipe_id'];
    $user_id = $_POST['user_id'];

    $data = [
        'user_id' => $user_id,
        'recipe_id' => $recipe_id
    ];
    if ($_POST['action'] == "like") {
        $favoritesTable->create($data);
    } else {
        $favoritesTable->delete($data);
    }

    $recipe = $recipesTable->details($recipe_id);
    include '_recipe_item.php';
} else {
    echo json_encode(['success' => false]);
}
