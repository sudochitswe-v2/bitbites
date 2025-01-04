<?php
session_start();
include '../../env_loader.php';

use Bb\Blendingbites\Helpers\HTTP;
use Bb\Blendingbites\Libs\Database\MySQL;
use Bb\Blendingbites\Libs\Database\UsersTable;


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $futureBlockMinutes = time() + 180; // next 3 minutes

    $fail_attempts = $_SESSION['fail_attempts'] ?? 0;

    $has_fail_attempts = $fail_attempts > 0;
    $has_blocked = isset($_SESSION['blocked_at']);

    if ($has_fail_attempts && $has_blocked && $_SESSION['blocked_at'] > time()) {
        $current_time = time();
        $blocked_at =  $_SESSION['blocked_at'];

        $diff_time = $blocked_at - $current_time;

        $minutes = floor($diff_time / 60);
        $seconds = $diff_time % 60;

        $message = "please wait $minutes minutes and $seconds seconds";

        HTTP::redirect('/pages/login.php', ['blocked' => $message]);
    }

    if ($has_blocked && $_SESSION['blocked_at'] < time()) {
        unset($_SESSION['blocked_at']);
        $_SESSION['fail_attempts'] = 0;
        $fail_attempts = 0;
    }

    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $table = new UsersTable(new MySQL());

    $user = $table->findByEmailAndPassword($email, $password,);

    if ($user) {
        $_SESSION['user'] = $user;
        unset($_SESSION['blocked']);
        HTTP::redirect("/index.php");
    } else {
        $fail_attempts++;
        $_SESSION['fail_attempts'] = $fail_attempts;
        if ($fail_attempts >= 3) {
            $_SESSION['blocked_at'] = $_SESSION['blocked_at'] ?? $futureBlockMinutes;
        }
        HTTP::redirect("/pages/auth/login.php", ["incorrect" =>  "$fail_attempts"]);
    }
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../../public/css/bootstrap/5.1.3/bootstrap.min.css">
    <link rel="stylesheet" href="../../public/css/style.css">
    <style>
        .wrap {
            width: 100%;
            max-width: 400px;
            margin: 40px auto;
        }
    </style>
</head>

<body class="text-center">
    <div class="wrap">
        <h1 class="h3 mb-3">Login</h1>

        <?php if (isset($_GET['blocked'])) : ?>
            <div class="alert alert-warning">
                <?= $_GET['blocked'] ?>
            </div>
        <?php endif ?>
        <?php if (isset($_GET['incorrect'])) : ?>
            <div class="alert alert-warning">
                Incorrect Email or Password.
            </div>
        <?php endif ?>

        <?php if (isset($_GET['registered'])) : ?>
            <div class="alert alert-success">
                Account created. Please login.
            </div>
        <?php endif ?>

        <form method="post">
            <input type="email" name="email" class="form-control mb-2" placeholder="Email" required>

            <input type="password" name="password" class="form-control mb-2" placeholder="Password" required>

            <button type="submit" class="w-100 btn btn-lg btn-primary text-black">
                Login
            </button>
        </form>
        <br>

        <a href="<?= HTTP::url('/pages/auth/register.php'); ?>">Register</a>
    </div>
</body>

</html>