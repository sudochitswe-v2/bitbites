<?php
require_once '../../env_loader.php';

use Bb\Blendingbites\Libs\Database\MySQL;
use Bb\Blendingbites\Libs\Database\RecipesTable;
$recipesTable = new RecipesTable(new MySQL());

if($_SERVER['REQUEST_METHOD']=='POST'){
if (isset($_POST['name'])) {
    $name=$_POST['name'];
    $recipes=$recipesTable->search($name);
}
}
include '_template.php';


