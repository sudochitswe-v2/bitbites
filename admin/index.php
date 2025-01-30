<!DOCTYPE html>
<html lang="en">
<?php
session_start();
require '../env_loader.php';
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="../public/css/style.css">
    <link rel="shortcut icon" href="../public/images/favico.png" type="image/png">
    <link rel="stylesheet" href="../public/css/bootstrap/5.1.3/bootstrap.min.css">
    <link rel="stylesheet" href="../public/css/font-awesome/5.10.0/all.min.css">
    <script src="../public/js/bootstrap/5.1.3/bootstrap.min.js"></script>
</head>


<body>

    <div class="d-flex vh-100">
        <?php include '_shared/_nav.php' ?>
        <main>
        </main>
    </div>
</body>

</html>