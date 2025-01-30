<?php
session_start();

use Bb\Blendingbites\Helpers\HTTP;
use Bb\Blendingbites\Helpers\ImageHandler;
use Bb\Blendingbites\Libs\Database\MySQL;
use Bb\Blendingbites\Libs\Database\UsersTable;

require_once '../../../env_loader.php';
include '../../../_classes/Helpers/message_box.php';


$id = $_GET['id'];
$usersTable = new UsersTable(new MySQL());
$user = $usersTable->getById($id);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../public/css/style.css">
    <link rel="shortcut icon" href="../../../public/images/favico.png" type="image/png">
    <link rel="stylesheet" href="../../../public/css/bootstrap/5.1.3/bootstrap.min.css">
    <link rel="stylesheet" href="../../../public/css/font-awesome/5.10.0/all.min.css">
    <link rel="stylesheet" href="../../../public/css/sweetalert2/sweetalert2.min.css">
    <script src="../../../public/js/sweetalert2/sweetalert2.min.js"></script>
    <script src="../../../public/js/bootstrap/5.1.3/bootstrap.min.js"></script>
    <script src="../../../public/js/helper/image-preview.js"></script>
    <title>Edit Profile</title>
    <style>
        .image-preview-container {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 20px;
        }

        .image-preview {
            width: 150px;
            height: 150px;
            border: 2px dashed #ccc;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            background-size: cover;
            background-position: center;
            background-color: #f9f9f9;
            overflow: hidden;
        }

        .image-preview span {
            color: #888;
            text-align: center;
        }

        .image-preview img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
    </style>
</head>
<header>
    <?php include '../../../_layout/nav_bar.php' ?>
</header>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    try {
        $image = null;
        if (isset($_FILES["image"]) && $_FILES["image"]["size"] != 0) {
            $image = ImageHandler::upload($_FILES);
        }
        $fullName = $_POST['first_name'] . ' ' . $_POST['last_name'];
        $data = [
            'id' => $_POST['id'],
            'first_name' => $_POST['first_name'],
            'last_name' => $_POST['last_name'],
            'name' => $fullName,
            'phone' => $_POST['phone'],
            'profile' => $image ?? $user['profile'], // if null
            'date_of_birth' => $_POST['date_of_birth'],
        ];
        $usersTable->update($data);
        showMessage('updated!', 'success');
        // make sure showMessage method call after swal is loaded from head tag 
    } catch (\Throwable $th) {
        $error = $th->getMessage();
        $_GET['error'] = $error;
    }
}
?>

<body>
    <div class="container py-5">
        <?php if (isset($_GET['error'])): ?>
            <div class="alert alert-danger" role="alert">
                <?= $_GET['error'] ?>
            </div>
        <?php endif; ?>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <!-- Profile Edit Box -->
                <div class="border rounded p-4">
                    <form method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?= htmlspecialchars($user['id']) ?>">
                        <!-- Profile Image and Upload Button -->
                        <div class="image-preview-container">
                            <label for="image" class="image-preview" <?php if (isset($user['profile'])) echo 'style="background-image: url(\'' . $_ENV['BASE_PATH'] . '/' .  htmlspecialchars($user['profile']) . '\'); : ""' ?> id='imagePreview'>
                                <span><?= isset($user['profile']) ? '' : 'Click to Upload Image' ?></span>
                            </label>
                            <div>
                                <input
                                    type="file"
                                    id="image"
                                    name="image"
                                    class="form-control"
                                    accept="image/*"
                                    style="display: none;">
                            </div>
                        </div>

                        <!-- Profile Edit Fields -->
                        <div class="mb-3">
                            <label for="username" class="form-label"><strong>First Name</strong></label>
                            <input type="text" class="form-control" id="firstName"
                                name="first_name"
                                value="<?= htmlspecialchars($user['first_name']) ?>">
                        </div>
                        <div class="mb-3">
                            <label for="username" class="form-label"><strong>Last Name</strong></label>
                            <input type="text" class="form-control" id="lastName"
                                name="last_name"
                                value="<?= htmlspecialchars($user['last_name']) ?>">
                        </div>
                        <div class="mb-3">
                            <label for="Date Of Birth" class="form label"><strong>Date Of Birth</strong></label>
                            <input type="date" class="form-control" id="date_of_birth"
                                name="date_of_birth"
                                value="<?= htmlspecialchars($user['date_of_birth']) ?>">
                        </div>
                        <div class="mb-3">
                            <label for="role" class="form-label"><strong>Role</strong></label>
                            <input disabled type="text" class="form-control" id="role"
                                value="<?= htmlspecialchars($user['role']) ?>">
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label"><strong>Mobile Phone</strong></label>
                            <input type="tel" class="form-control" id="phone" name="phone"
                                value="<?= htmlspecialchars($user['phone']) ?>">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label"><strong>Email Address</strong></label>
                            <input disabled type="email" class="form-control" id="email" value="<?= htmlspecialchars($user['email']) ?>">
                        </div>

                        <!-- Action Buttons -->
                        <div class="text-end mt-4">
                            <a href="<?= HTTP::url('/pages/users/profile/index.php?id=') . $user['id'] ?>" type="button" class="btn btn-secondary me-2">Cancel</a>
                            <button type="submit" class="btn btn-primary text-black">
                                <i class="bi bi-check-circle me-2"></i> Save Changes
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <?php include '../../../_layout/footer.php' ?>
</body>

</html>