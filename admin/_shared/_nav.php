<?php

use Bb\Blendingbites\Helpers\Auth;
use Bb\Blendingbites\Helpers\HTTP;

 Auth::requireAdminAccess();
?>
<div class="vh-100 p-3" style="width: 250px; background-color: #F1F1F1">
    <h4 class="text-center mb-4">Admin Panel</h4>
    <nav class="nav flex-column">
        <a href="<?= HTTP::url('/admin') ?>" class="nav-link fw-semibold">Dashboard</a>
        <a href="<?= HTTP::url('/admin/cuisines') ?>" class="nav-link fw-semibold">Cuisines</a>
        <a href="<?= HTTP::url('/admin/recipes') ?>" class="nav-link fw-semibold">Recipes</a>
        <a href="<?= HTTP::url('/admin/dietary-preferences') ?>" class="nav-link fw-semibold">Dietary Preferences</a>
        <a href="<?= HTTP::url('/') ?>" class="nav-link">
            <i class="fa fa-arrow-left"></i> Back to website
        </a>
    </nav>
</div>