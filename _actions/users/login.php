<?php
session_start();

use Bb\Blendingbites\Helpers\HTTP;
use Bb\Blendingbites\Libs\Database\MySQL;
use Bb\Blendingbites\Libs\Database\UsersTable;

include('../../env_loader.php');

$futureBlockMinutes = time() + 15; // next 3 minutes

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

    HTTP::redirect('/login.php', ['blocked' => $message]);
} else {
    unset($_SESSION['blocked_at']);
    $_SESSION['fail_attempts'] = 0;
}

$email = $_POST['email'];
$password = md5($_POST['password']);

$table = new UsersTable(new MySQL());

$user = $table->findByEmailAndPassword($email, $password);

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
    HTTP::redirect("/login.php", ["incorrect" => $fail_attempts]);
}
