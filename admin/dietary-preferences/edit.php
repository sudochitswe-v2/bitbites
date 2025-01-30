<?php
session_start();
require_once '../../env_loader.php';

use Bb\Blendingbites\Helpers\HTTP;
use Bb\Blendingbites\Libs\Database\MySQL;
use Bb\Blendingbites\Libs\Database\DietaryPreferencesTable;

$id = $_GET['id'];
$DietaryPreferencesTable = new DietaryPreferencesTable(new MySQL());
$DietaryPreferences = $DietaryPreferencesTable->getById($id);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $id = $_POST['id'];
    $name = $_POST['name'];
    $data = [
        'id' => $id,
        'name' => $name,
    ];

    try {
        $DietaryPreferencesTable->Update($data);
        HTTP::redirect('/admin/dietary-preferences');;
        exit();
    } catch (throwable $e) {
        $_GET['error'] = $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dietary Preferences</title>
    <link rel="stylesheet" href="../../public/css/style.css">
    <link rel="shortcut icon" href="../../public/images/favico.png" type="image/png">
    <link rel="stylesheet" href="../../public/css/bootstrap/5.1.3/bootstrap.min.css">
    <link rel="stylesheet" href="../../public/css/font-awesome/5.10.0/all.min.css">
    <script src="../public/js/bootstrap/5.1.3/bootstrap.min.js"></script>
</head>

<body>
    <div class="d-flex vh-100">
        <?php include '../_shared/_nav.php' ?>
        <main class="container my-5 flex-grow-1 overflow-auto bg-light">
            <?php include '_form.php'; ?>
        </main>
    </div>
</body>

</html>