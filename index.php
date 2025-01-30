<?php

use Bb\Blendingbites\Helpers\HTTP;

include 'env_loader.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    session_start();
    $data = [
        'first_name' => $_POST['first_name'],
        'last_name' => $_POST['last_name'],
        'email' => $_POST['email'],
        'password' => $_POST['password']
    ];
    $_SESSION['signup_data'] = $data;
    HTTP::redirect('/pages/auth/register.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BlendingBites</title>
    <link rel="shortcut icon" href="public/images/favico.png" type="image/png">
    <link rel="stylesheet" href="public/css/style.css">
    <link rel="stylesheet" href="public/css/bootstrap/5.1.3/bootstrap.min.css">
    <link rel="stylesheet" href="public/css/font-awesome/5.10.0/all.min.css">
    <script src="public/js/bootstrap/5.1.3/bootstrap.min.js"></script>

</head>
<style>
    /* Pop-up modal styling */
    .modal-dialog-centered {
        transition: opacity 0.3s ease-in-out;
    }
</style>

<header>
    <?php include '_layout/nav_bar.php'; ?>
</header>

<body>
    <?php include '_layout/home/home.php' ?>

    <?php include '_layout/footer.php' ?>

    <!-- Pop-up Modal -->
    <div class="modal fade" id="signupModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <button type="button" class="btn-close position-absolute top-0 end-0 m-3" data-bs-dismiss="modal" aria-label="Close"></button>
                    <img src="<?= HTTP::url('/public/images/favico.png') ?>" style="width:50px; height:50px;" alt="Logo" class="mx-auto d-block">
                </div>
                <div class="modal-body">
                    <div class="modal-text">
                        <h5 class="text-center mb-3"><strong>The world is your kitchen!</strong></h5>
                        <h6 class="text-center">Join our BlendingBites and embark on a culinary journey of flavor and discovery.</h6>
                        <h6 class="text-center mb-3">"Share your passion for food with a diverse community and let your creations inspire."<br>
                            <br><strong>Sign up now and unleash your inner chef!</strong></class>
                    </div>
                    <form id="popupForm" method="post">
                        <!-- First Name -->
                        <div class="mb-3">
                            <input type="text" class="form-control" id="firstName" name="first_name" placeholder="First Name" required>
                        </div>
                        <!-- Last Name -->
                        <div class="mb-3">
                            <input type="text" class="form-control" id="lastName" name="last_name" placeholder="Last Name" required>
                        </div>
                        <!-- Email -->
                        <div class="mb-3">
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email Address" required>
                        </div>
                        <!-- Password -->
                        <div class="mb-3">
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                        </div>
                        <!-- Sign Up Button -->
                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary w-30">Sign Up</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>
<script>
    // Show the modal after 2 seconds
    setTimeout(() => {
        const signupModal = new bootstrap.Modal(document.getElementById('signupModal'));
        signupModal.show();
    }, 1000);
</script>

</html>