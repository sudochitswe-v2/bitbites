<?php session_start() ?>
<link rel="stylesheet" href="/css/template/nav.css">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4 px-lg-5 py ">
    <a href="" class="navbar-brand p-0">
        <h1 class="bb-text-primary m-0">
            <i class="fa fa-utensils me-3"></i>
        </h1>
    </a>
    <div class="d-flex align-items-center">
        <i class="fa fa-bars navbar-toggler me-2" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"></i>
        <!-- <button class="navbar-toggler me-2" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="fa fa-bars"></span>
        </button> -->

        <?php $isAuth = isset($_SESSION['user']) ?>

        <?php if ($isAuth): ?>
            <div class="dropdown d-lg-none">
                <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle"
                    id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="https://via.placeholder.com/40" alt="Avatar" class="rounded-circle me-2" width="40"
                        height="40">
                    <span>John Doe</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                    <li><a class="dropdown-item" href="#">Profile</a></li>
                    <li><a class="dropdown-item" href="#">Settings</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="#">Sign Out</a></li>
                </ul>
            </div>
        <?php else : ?>
            <a href="" class="btn btn-primary py-2 px-4 d-lg-none">Login</a>
        <?php endif ?>

    </div>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto py-0 pe-4">
            <a href="" class="nav-item nav-link active">Home</a>
            <a href="" class="nav-item nav-link">About</a>
            <a href="" class="nav-item nav-link">Service</a>
            <a href="" class="nav-item nav-link">Menu</a>
            <a href="" class="nav-item nav-link">Pages</a>
            <a href="" class="nav-item nav-link">Contact</a>
        </div>

        <?php if ($isAuth): ?>
            <div class="dropdown">
                <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle"
                    id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="https://via.placeholder.com/40" alt="Avatar" class="rounded-circle me-2" width="40"
                        height="40">
                    <span>John Doe</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                    <li><a class="dropdown-item" href="#">Profile</a></li>
                    <li><a class="dropdown-item" href="#">Settings</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="#">Sign Out</a></li>
                </ul>
            </div>
        <?php else : ?>
            <a href="" class="btn btn-primary py-2 px-4 d-none d-lg-block">Login</a>
        <?php endif ?>
    </div>