<?php
session_start();

use Bb\Blendingbites\Libs\Database\MySQL;
use Bb\Blendingbites\Libs\Database\UsersTable;

require '../../env_loader.php';

$users = new UsersTable(new MySQL());

// Search Functionality
$searchQuery = $_GET['search'] ?? '';
$allUsers = $users->getAll($searchQuery);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/css/style.css">
    <link rel="shortcut icon" href="../../public/images/favico.png" type="image/png">
    <link rel="stylesheet" href="../../public/css/bootstrap/5.1.3/bootstrap.min.css">
    <link rel="stylesheet" href="../../public/css/font-awesome/5.10.0/all.min.css">
    <script src="../public/js/bootstrap/5.1.3/bootstrap.min.js"></script>
    <title>Manage Users</title>

</head>

<body>
    <div class="d-flex vh-100">
        <?php include '../_shared/_nav.php' ?>
        <main class="container my-2 flex-grow-1 overflow-auto bg-light">
            <h1 class="text-primary mb-4 text-black">Manage Users</h1>

            <!-- Search Bar -->
            <form method="GET" class="mb-3">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Search users..." value="<?= htmlspecialchars($searchQuery) ?>">
                    <button class="btn btn-primary" type="submit">Search</button>
                </div>
            </form>

            <!-- Users Table -->
            <table class="table table-bordered bg-white shadow-sm">
                <thead class="bg-primary text-black">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($allUsers as $user): ?>
                        <tr>
                            <td><?= htmlspecialchars($user['id']) ?></td>
                            <td><?= htmlspecialchars($user['name']) ?></td>
                            <td><?= htmlspecialchars($user['email']) ?></td>
                            <td><?= htmlspecialchars($user['role']) ?></td>
                            <td>
                                <div class="d-flex gap-3">
                                    <a href="edit.php?id=<?= $user['id'] ?>" class="btn btn-warning btn-sm rounded-circle" style="width: 30px; height: 30px;">
                                        <i class="far fa-edit"></i>
                                    </a>
                                    <a href="delete.php?id=<?= $user['id'] ?>" class="btn btn-danger btn-sm rounded-circle" style="width: 30px; height: 30px;">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </main>
    </div>
</body>

</html>