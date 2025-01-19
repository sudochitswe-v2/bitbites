<div class="row gy-4">
    <?php

    use Bb\Blendingbites\Helpers\HTTP;

    if (empty($recipes)): ?>
        <p>No recipes found.</p>
    <?php else: ?>
        <?php foreach ($recipes as $recipe): ?>

            <div class="col-md-6">
                <div class="card h-100">
                    <a href="<?= HTTP::url('/pages/recipes/detail.php') ?>?id=<?= $recipe['id'] ?>">
                        <img src="<?= $_ENV['BASE_PATH'] . '/' . htmlspecialchars($recipe['image']) ?>" class="card-img-top" alt="Recipe Photo">
                    </a>
                    <div class="card-body d-flex flex-column justify-content-between">
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="fw-bold"><?= htmlspecialchars($recipe['name']) ?></span>
                            <div class="d-flex align-items-center">
                                <i class="far fa-heart text-danger me-1 heart-icon" onclick="increaseLikes(this)"></i>
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
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    <?php endif ?>

</div>