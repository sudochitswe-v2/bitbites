<?php
require_once '../../env_loader.php';

use Bb\Blendingbites\Helpers\HTTP;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Unauthorized </title>
    <link rel="stylesheet" href="../../public/css/style.css">
    <link rel="shortcut icon" href="../../public/images/favico.png" type="image/png">
    <link rel="stylesheet" href="../../public/css/bootstrap/5.1.3/bootstrap.min.css">
    <link rel="stylesheet" href="../../public/css/font-awesome/5.10.0/all.min.css">
    <script src="../js/bootstrap/5.1.3/bootstrap.min.js"></script>
</head>

<body class="bg-light">
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="text-center">
            <h1 class="display-1 text-danger">401 Unauthorized</h1>
            <p class="lead text-muted">Oops! You don't have permission to do this action.</p>
            <a href="<?= HTTP::url('/') ?>" class="btn btn-primary btn-lg">Go Back to Home</a>
        </div>
    </div>
</body>

</html>