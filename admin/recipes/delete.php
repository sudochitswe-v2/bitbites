<?php
session_start();
require_once '../../env_loader.php';

use Bb\Blendingbites\Libs\Database\MySQL;
use Bb\Blendingbites\Libs\Database\RecipesTable;

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    try {
        $recipesTable = new RecipesTable(new MySQL());
        $recipesTable->delete($id);
        header('Location: index.php');
        exit();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
