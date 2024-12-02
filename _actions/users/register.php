<?php

use Bb\Blendingbites\Helpers\HTTP;
use Bb\Blendingbites\Libs\Database\MySQL;
use Bb\Blendingbites\Libs\Database\UsersTable;

include('../../env_loader.php');

try {
    // prepre data from super global variable $POST
    $data =  [
        "name" => $_POST['name'] ?? 'Unknown',
        "email" => $_POST['email'] ?? 'Unknown',
        "phone" => $_POST['phone'] ?? 'Unknown',
        "address" => $_POST['address'] ?? 'Unknown',
        "password" => md5($_POST['password']),
        "role_id" => 1,
    ];

    // create connection to users table
    $table = new UsersTable(new MySQL());

    // insert register data
    $table->insert($data);

    HTTP::redirect('/login.php', ["registered" => true]);
} catch (Exception $e) {

    HTTP::redirect('/register.php', ["error" => $e->getMessage()]);
}
