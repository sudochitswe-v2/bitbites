<?php

// login action hanlding will wrote this in file

use Bb\Blendingbites\Helpers\HTTP;
use Bb\Blendingbites\Libs\Database\UsersTable;

require_once "env_loader.php";
$users = new UsersTable();

$user = $users->getUser("chitswe@apexintegra.com");

if ($user) {
    HTTP::redirect("index.php");
}
