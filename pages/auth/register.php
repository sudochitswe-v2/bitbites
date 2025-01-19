<?php
include '../../env_loader.php';

use Bb\Blendingbites\Helpers\HTTP;
use Bb\Blendingbites\Helpers\ImageHandler;
use Bb\Blendingbites\Libs\Database\MySQL;
use Bb\Blendingbites\Libs\Database\UsersTable;


try {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $image = null;
        if (isset($_FILES["image"]) && $_FILES["image"]["size"] != 0) {
            $image = ImageHandler::upload($_FILES);
        }

        // prepare data from super global variable $POST
        $data =  [
            "first_name" => $_POST['first_name'],
            "last_name" => $_POST['last_name'],
            "name" => $_POST['first_name'] . ' ' . $_POST['last_name'],
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
    }
} catch (Throwable $e) {

    $_GET['error'] = $e->getMessage();
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Register</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/css/bootstrap/5.1.3/bootstrap.min.css">
    <link rel="stylesheet" href="../../public/css/style.css">
    <link rel="shortcut icon" href="../../public/images/favico.png" type="image/png">
    <link rel="stylesheet" href="register.php.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="../../public/js/helper/image-preview.js"></script>
</head>

<body class="text-center">
    <div class="wrap">
        <h1 class="h3 mb-3">Register</h1>

        <?php if (isset($_GET['error'])) : ?>
            <div class="alert alert-warning">
                <?= $_GET['error'] ?>
            </div>
        <?php endif ?>

        <form method="post" enctype="multipart/form-data">
            <div class="image-preview-container">
                <label for="image" class="image-preview pt-2" id="imagePreview">
                    <span>Click to Uplode Photo</span>
                </label>
                <input type="file" name="image" id="image" class="form-control"
                    accept="image/*" required style="display: none;">
            </div>
            <br>

            <input type="text" name="first_name" class="form-control mb-2" placeholder="First Name" required>

            <input type="text" name="last_name" class="form-control mb-2" placeholder="Last Name" required>

            <input type="date" name="date_of_birth" class="form-control mb-2" placeholder="Date of Birth" required>

            <input type="text" name="phone" class="form-control mb-2" placeholder="Phone Number" required>

            <input type="email" name="email" class="form-control mb-2" placeholder="Email Address" required>

            <input type="password" name="password" class="form-control mb-2" placeholder="Password" required>

            <button type="submit" class="w-50 btn btn-md mt-1 btn-primary text-black">
                Register
            </button>
        </form>

        <a href="login.php" class="w-50 btn btn-md mt-1 btn-primary text-black">Login</a> <br>
        <a href="<?= HTTP::url('/'); ?>" class="text-black">Back To Home</a>
    </div>
</body>

</html>