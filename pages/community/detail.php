<?php
session_start();

use Bb\Blendingbites\Helpers\Auth;
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
    <script src="../../public/js/bootstrap/5.1.3/bootstrap.bundle.min.js"></script>
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
                        <form action="_comment.php?<?= $comment['id'] ?>" method="post">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="id" value="<?= $comment['id'] ?>">
                            <input type="hidden" name="url" value="<?= $_SERVER['REQUEST_URI'] ?>">
                            <div class="mb-2">
                                <div class="d-flex justify-content-between align-items-start">
                                    <div>
                                        <strong>
                                            <?= htmlspecialchars($comment['user_name']) ?>
                                        </strong>
                                        <p class="mb-1">
                                            <?= htmlspecialchars($comment['content']) ?>
                                        </p>
                                    </div>
                                    <?php if (Auth::check() && $comment['user_id'] === Auth::check()->id): ?>
                                        <button type="submit" class="btn btn-sm btn-danger"
                                            onclick="return confirm('Are you sure?')">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    <?php endif; ?>
                                </div>
                                <hr class="text-muted">
                            </div>
                        </form>
                    <?php endforeach; ?>

                    <?php if (Auth::check()): ?>
                        <form action="_comment.php" method="post">
                            <div class="input-group mt-3">
                                <input type="hidden" name="_method" value="POST">
                                <input type="hidden" name="post_id" value="<?= $post['id'] ?>">
                                <input type="hidden" name="url" value="<?= $_SERVER['REQUEST_URI'] ?>">
                                <input type="text" name="content" class="form-control comment-box" placeholder="Write your comment">
                                <button type="submit" class="input-group-text bg-white">
                                    <i class="bi bi-send"></i>
                                </button>
                            </div>
                        </form>
                    <?php endif; ?>
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