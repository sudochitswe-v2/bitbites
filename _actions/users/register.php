<?php

use Bb\Blendingbites\Helpers\HTTP;
use Bb\Blendingbites\Helpers\ImageHandler;
use Bb\Blendingbites\Libs\Database\MySQL;
use Bb\Blendingbites\Libs\Database\UsersTable;

include('../../env_loader.php');

try {
    $image = null;
    if (isset($_FILES["image"]) && $_FILES["image"]["size"] != 0) {
        $image = ImageHandler::upload($_FILES);
    }

    // prepare data from super global variable $POST
    $data =  [
        "first_name" => $_POST['first_name'],
        "last_name" => $_POST['last_name'],
        "name" => $_POST['first_name'] .' '. $_POST['last_name'],
        "profile" => $image,
        "phone" => $_POST['phone'],
        "email" => $_POST['email'] ?? 'Unknown',
        "password" => md5($_POST['password']),
        "role_id" => 1,
    ];

    // create connection to users table
    $table = new UsersTable(new MySQL());

    // insert register data
    $table->insert($data);

    HTTP::redirect('/pages/login.php', ["registered" => true]);
} catch (Exception $e) {

    HTTP::redirect('/pages/register.php', ["error" => $e->getMessage()]);
}
