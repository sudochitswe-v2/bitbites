<?php session_start() ?>

<?php

use Bb\Blendingbites\Helpers\HTTP;

$isAuth = isset($_SESSION['user']);
$authUser = $isAuth ? $_SESSION['user'] : null;
?>

<?php if ($isAuth && $authUser->value == 2): ?>
    <div class="d-flex justify-content-center text-black">
        <a href="admin/" class=" text-black text-decoration-none text-decoration-underline">
            <h4>Go to Admin Panel</h4>
        </a>
    </div>
<?php endif ?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4 px-lg-5 py">
    <a href="<?= HTTP::url('/') ?>" class="navbar-brand p-0">
        <h1 class="bb-text-primary m-0">
            <i class="fa fa-utensils me-3"></i>
        </h1>
    </a>
    <div class="d-flex align-items-center">
        <i class="fa fa-bars navbar-toggler me-2" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"></i>


        <?php if ($isAuth): ?>
            <div class="dropdown d-lg-none">
                <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle"
                    id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="<?= $_ENV['BASE_PATH'] . '/' . $authUser->profile ?>" alt="Avatar" class="rounded-circle me-2" width="40"
                        height="40">
                    <span><?= $authUser->name ?></span>
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                    <li><a class="dropdown-item" href="<?= HTTP::url('/pages/users/profile/index.php?id=') . $authUser->id ?>">Profile</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <form action="<?= HTTP::url('/_actions/users/logout.php') ?>" method="post">
                            <button class="dropdown-item" type="submit">Sign Out</button>
                        </form>
                    </li>
                </ul>
            </div>
        <?php else : ?>
            <a href="<?= HTTP::url('/pages/auth/login.php'); ?>" class="btn btn-primary py-2 px-4 d-lg-none text-black">Login</a>
        <?php endif ?>

    </div>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto py-0 pe-4">
            <a href="<?= HTTP::url('/pages/recipes') ?>" class="nav-item nav-link active">Recipe</a>
            <a href="<?= HTTP::url('/pages/about') ?>" class="nav-item nav-link">About</a>
            <a href="#" class="nav-item nav-link">Community</a>
            <a href="<?= HTTP::url('/pages/contact') ?>" class="nav-item nav-link">Contact Us</a>
            <div class="dropdown"><a href="#"
                    id="navbarDropDown"
                    class="nav-link dropdown-toggle"
                    role="button"
                    data-bs-toggle="dropdown"
                    aria-expanded="false">Resources
                </a>
                <div class="dropdown-menu dropdown-menu-end">
                    <a href="#" class="dropdown-item">Culinary Resources</a>
                    <a href="#" class="dropdown-item">Educational Resources</a>
                </div>
            </div>
        </div>

        <?php if ($isAuth): ?>
            <div class="dropdown d-none d-lg-block">
                <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle"
                    id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="<?= $_ENV['BASE_PATH'] . '/' . $authUser->profile ?>" alt="Avatar" class="rounded-circle me-2" width="40"
                        height="40">
                    <span><?= $authUser->name ?></span>
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                    <li><a class="dropdown-item" href="<?= HTTP::url('/pages/users/profile/index.php?id=') . $authUser->id ?>">Profile</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <form action="<?= HTTP::url('/_actions/users/logout.php') ?>" method="post">
                            <button class="dropdown-item" type="submit">Sign Out</button>
                        </form>
                    </li>
                </ul>
            </div>
        <?php else : ?>
            <a href="<?= HTTP::url('/pages/auth/login.php'); ?>" class="btn btn-primary py-2 px-4 d-none d-lg-block text-black">Login</a>
        <?php endif ?>
    </div>