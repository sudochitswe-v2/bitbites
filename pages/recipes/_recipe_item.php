<?php

use Bb\Blendingbites\Helpers\HTTP;
use Bb\Blendingbites\Helpers\Auth;
?>

<div class="card h-100">
    <a href="<?= HTTP::url('/pages/recipes/detail.php') ?>?id=<?= $recipe['id'] ?>">
        <img src="<?= $_ENV['BASE_PATH'] . '/' . htmlspecialchars($recipe['image']) ?>" class="card-img-top" alt="Recipe Photo">
    </a>
    <div class="card-body d-flex flex-column justify-content-between">
        <div class="d-flex justify-content-between align-items-center">
            <span class="fw-bold"><?= htmlspecialchars($recipe['name']) ?></span>
            <div class="d-flex align-items-center">
                <?php
                $user = Auth::check();
                $liked = $user && in_array($user->id, $recipe['liked_user_ids']); ?>
                <?php if ($liked): ?>
                    <button class="dislike-btn btn-small bg-transparent border-0"
                        data-recipe-id="<?= $recipe['id'] ?>"
                        data-user-id="<?= !$user ? 0 : $user->id ?>">
                        <i class="fas fa-heart text-danger me-1"></i>
                    </button>

                <?php else: ?>
                    <button class="like-btn btn-small bg-transparent border-0"
                        data-recipe-id="<?= $recipe['id'] ?>"
                        data-user-id="<?= !$user ? 0 : $user->id ?>">
                        <i class="far fa-heart text-danger me-1"></i>
                    </button>
                <?php endif ?>


                <span class="like-count"><?= htmlspecialchars(count($recipe['liked_user_ids'])) ?></span>
            </div>
            <span class="text-muted"><?= htmlspecialchars($recipe['difficulty']['name']) ?></span>
        </div>
        <div class="d-flex justify-content-end">
            <?php
            for ($i = 1; $i <= $recipe['difficulty']['value']; $i++) {
                echo '<i class="col-xs fa fa-star text-warning"></i>';
            }
            ?>
        </div>
        <p class="text-muted mb-0"><?= htmlspecialchars($recipe['cuisine']['name']) ?></p>
        <div class="d-flex flex-wrap gap-1">
            <?php foreach ($recipe['dietary_preferences'] as $preferences): ?>
                <div class="badge bg-warning">
                    <i class="fas fa-tag"></i>
                    <?= htmlspecialchars($preferences['name']) ?>
                </div>
            <?php endforeach ?>
        </div>
    </div>
</div>