<?php

use Bb\Blendingbites\Helpers\HTTP;
use Bb\Blendingbites\Libs\Database\MySQL;
use Bb\Blendingbites\Libs\Database\UsersTable;

require_once '../../../env_loader.php';

$id = $_GET['id'];
$usersTable = new UsersTable(new MySQL());
$user = $usersTable->getById($id);

?>


<!DOCTYPE html>
<html lang="en">
<header>
    <?php include '../../../_layout/nav_bar.php' ?>
</header>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../public/css/style.css">
    <link rel="stylesheet" href="../../../public/css/bootstrap/5.1.3/bootstrap.min.css">
    <link rel="stylesheet" href="../../../public/css/font-awesome/5.10.0/all.min.css">
    <script src="../../../public/js/bootstrap/5.1.3/bootstrap.min.js"></script>
    <title>User Profile</title>
</head>

<body>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6">

                <div class="border rounded p-4">

                    <div class="text-center mb-4">
                        <img src="<?= $_ENV['BASE_PATH'] . '/' . htmlspecialchars($user['profile']) ?>" alt="Profile Picture" class="rounded-circle img-fluid" style="width: 150px; height: 150px;">
                    </div>

                    <div class="mb-3">
                        <p><strong>User Name:</strong><?= htmlspecialchars($user['name']) ?></p>
                        <p><strong>Role:</strong><?= htmlspecialchars($user['role']) ?></p>
                        <p><strong>Mobile Phone:</strong> <?= htmlspecialchars($user['phone']) ?></p>
                        <p><strong>Email Address:</strong> <?= htmlspecialchars($user['email']) ?></p>
                    </div>
                    <!-- only allow user to edit their own profile -->
                    <?php if ($isAuth && $authUser->id === $user['id']): ?>
                        <div class="text-center">
                            <a class="btn btn-outline-primary text-black d-inline-flex align-items-center"
                                href="<?= HTTP::url('/pages/users/profile/edit.php?id=') . $user['id'] ?>">
                                <i class="fa fa-edit me-2"></i> Edit Information
                            </a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

</body>
<?php include '../../../_layout/footer.php' ?>

</html>