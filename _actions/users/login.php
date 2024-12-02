<?php
session_start();

use Bb\Blendingbites\Helpers\HTTP;
use Bb\Blendingbites\Libs\Database\MySQL;
use Bb\Blendingbites\Libs\Database\UsersTable;

include('../../env_loader.php');



$email = $_POST['email'];
$password = md5($_POST['password']);

$table = new UsersTable(new MySQL());

$user = $table->findByEmailAndPassword($email, $password);

if ($user) {
    $_SESSION['user'] = $user;
    HTTP::redirect("/index.php");
} else {
    HTTP::redirect("/login.php", ["incorrect" => true]);
}
