<?php

use Bb\Blendingbites\Libs\Database\MySQL;
use Bb\Blendingbites\Libs\Database\UsersTable;

require '../../env_loader.php';

$users = new UsersTable(new MySQL());

$id = $_GET['id'] ?? null;

if ($id && $users->deleteUser($id)) {
    header('Location: users.php');
    exit;
} else {
    echo "Error deleting user.";
}
