<?php

use Bb\Blendingbites\Helpers\HTTP;
use Bb\Blendingbites\Libs\Database\MySQL;
use Bb\Blendingbites\Libs\Database\PostsTable;

require_once '../../env_loader.php';

$id = $_GET['id'];

$postsTable = new PostsTable(new MySQL());

$post = $postsTable->detail($id);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/css/style.css">
    <link rel="shortcut icon" href="../../public/images/favico.png" type="image/png">
    <link rel="stylesheet" href="../../public/css/bootstrap/5.1.3/bootstrap.min.css">
    <link rel="stylesheet" href="../../public/css/font-awesome/5.10.0/all.min.css">
    <script src="../../public/js/bootstrap/5.1.3/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <title>Post Detail</title>
</head>
<header>
    <?php include '../../_layout/nav_bar.php'; ?>
</header>
<style>
    /* Hover effect for input box */
    .comment-box:focus {
        border: 2px solid black;
        box-shadow: none;
    }
</style>

<body>

    <body style="background: var(--primary);">

        <div class="container py-4 justify-content-center col-md-6">
            <!-- User Post Card -->
            <div class="border rounded mb-5 m-4">
                <!-- User Info -->
                <div class="d-flex align-items-center p-2 bg-dark text-light rounded-top">
                    <img src="<?= $_ENV['BASE_PATH'] . '/' . $post['user_profile'] ?>" alt="User" class="rounded-circle me-2" width="40" height="40">
                    <strong><?= htmlspecialchars($post['user_name']) ?></strong>
                </div>

                <!-- User Post Content -->
                <div class="p-3 bg-light text-bg-light">
                    <p><?= htmlspecialchars($post['content']) ?></p>
                    <?php if (!empty($post['image'])): ?>
                        <img src="<?= $_ENV['BASE_PATH'] . '/' . $post['image'] ?>" alt="Post Image" class="img-fluid">
                    <?php endif; ?>
                </div>

                <!-- Footer: Comments & Options -->
                <div class="d-flex justify-content-between align-items-center p-2 bg-dark text-light rounded-bottom">
                    <span>
                        <i class="bi bi-chat"></i> Comments: <?= htmlspecialchars($post['total_comments']) ?>
                    </span>
                </div>

                <div class="p-3 bg-white border-top">

                    <!-- Display Existing Comments -->
                    <?php foreach ($post['comments'] as $comment): ?>
                        <div class="mb-2">
                            <strong><?= htmlspecialchars($comment['user_name']) ?></strong>
                            <p class="mb-1"><?= htmlspecialchars($comment['content']) ?></p>
                            <hr class="text-muted">
                        </div>
                    <?php endforeach; ?>

                    <div class="input-group mt-3">
                        <input type="text" class="form-control comment-box" placeholder="Write your comment">
                        <span class="input-group-text bg-white">
                            <i class="bi bi-send"></i>
                        </span>
                    </div>
                </div>
            </div>
            <div class="text-end">
                <a href="../community/index.php" class="btn btn-dark">
                    <i class="bi bi-arrow-left"></i>Back To Post
                </a>
            </div>
        </div>

        <?php include '../../_layout/footer.php' ?>
    </body>

</html>