<?php
require_once '../../env_loader.php';

use Bb\Blendingbites\Libs\Database\MySQL;
use Bb\Blendingbites\Libs\Database\RecipesTable;

$recipesTable = new RecipesTable(new MySQL());
$recipes = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $search = $_POST['search'] ?? '';
    $cuisine = $_POST['cuisine'] ?? '';
    $difficulty = $_POST['difficulty'] ?? '';

    $recipes = $recipesTable->filterByCuisineAndDifficulty($search, $cuisine, $difficulty);

}

include '_template.php';
