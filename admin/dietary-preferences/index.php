<?php

use Bb\Blendingbites\Libs\Database\DietaryPreferencesTable;
use Bb\Blendingbites\Libs\Database\MySQL;

require '../../env_loader.php';
$dietariesTable = new DietaryPreferencesTable(new MySQL());
$dietaries = $dietariesTable->getAll();
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
        <main class="container my-2 flex-grow-1 overflow-auto bg-light">
            <div class="d-flex sticky-top justify-content-between align-items-center mb-4 bg-light">
                <h1 class="text-black">Dietary Preferences</h1>
                <a href="add.php" class="btn btn-info mb-3">Add New Dietary Preferences</a>
            </div>
            <?php if (isset($_GET['error'])): ?>
                <div class="alert alert-danger" role="alert">
                    <?= htmlspecialchars($_GET['error']) ?>
                </div>
            <?php endif ?>

            <?php foreach ($dietaries as $dietary): ?>
                <div class="card border rounded p-3 shadow-sm mb-3">
                    <div class="row">
                        <div class="col-12">
                            <div class="d-flex justify-content-between align-items center mb-2">
                                <p class="mb-0">
                                    <?= htmlspecialchars($dietary['name']) ?>
                                </p>
                                <!-- Edit and Delete Buttons -->
                                <div class="d-flex gap-2 justify-content-end">
                                    <a href="edit.php?id=<?= htmlspecialchars($dietary['id']) ?>"
                                        class="btn btn-warning btn-sm rounded-circle"
                                        style="width:30px; height:30px;">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="delete.php?id=<?= htmlspecialchars($dietary['id']) ?>"
                                        class="btn btn-danger btn-sm rounded-circle"
                                        style="width:30px; height:30px;">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>

        </main>
    </div>
</body>

</html>