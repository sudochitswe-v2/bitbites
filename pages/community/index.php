<?php require '../../env_loader.php';

use Bb\Blendingbites\Helpers\HTTP;
use Bb\Blendingbites\Libs\Database\MySQL;
use Bb\Blendingbites\Libs\Database\PostsTable;

$posts = new PostsTable(new MySQL());
$uploadPosts = $posts->getAll();



?>

<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/css/style.css">
    <link rel="shortcut icon" href="../../public/images/favico.png" type="image/png">
    <link rel="stylesheet" href="../../public/css/font-awesome/5.10.0/all.min.css">
    <link rel="stylesheet" href="../../public/css/bootstrap/5.1.3/bootstrap.min.css">
    <script src="../../public/js/bootstrap/5.1.3/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <title>Community Cookbook</title>
</head>
<header>
    <?php include '../../_layout/nav_bar.php'; ?>
</header>

<body>

    <body style="background: var(--primary);">

        <div class="container py-4 justify-content-center col-md-6">
            <!-- Section 1: Share Post -->
            <div class="bg-white p-3 rounded shadow-sm mb-4">
                <div class="d-flex justify-content-between align-items-center">
                    <span class="text-black">Share Your Valuable Experience and Thoughts <br>In Our Community!<br> We're very pleased to share Posts & Comments!</span>
                    <a href="post-upload.php" class="btn btn-primary">Share</a>
                </div>
            </div>

            <!-- Section 2: User Posts -->
            <?php foreach ($uploadPosts as $uploadPost): ?>

                <!-- User Post Card -->
                <div class="border rounded mb-5 m-4">
                    <!-- User Info -->
                    <div class="d-flex align-items-center p-2 bg-dark text-light rounded-top">
                        <img src="<?= $_ENV['BASE_PATH'] . '/' . $uploadPost['user_profile'] ?>" alt="User" class="rounded-circle me-2" width="40" height="40">
                        <strong><?= htmlspecialchars($uploadPost['user_name']) ?></strong>
                    </div>

                    <!-- User Post Content -->
                    <div class="p-3 bg-light text-bg-light">
                        <p><?= htmlspecialchars($uploadPost['content']) ?></p>
                        <?php if (!empty($uploadPost['image'])): ?>
                            <img src="<?= $_ENV['BASE_PATH'] . '/' . $uploadPost['image'] ?>" alt="Post Image" class="img-fluid">
                        <?php endif; ?>
                    </div>

                    <!-- Footer: Comments & Options -->
                    <div class="d-flex justify-content-between align-items-center p-2 bg-dark text-light rounded-bottom">
                        <a href="<?= HTTP::url('/pages/community/detail.php?id=') . $uploadPost['id'] ?>" class="text-decoration-none text-white"><span><i class="bi bi-chat"></i> Comments: <?= htmlspecialchars($uploadPost['total_comments']) ?></span></a>

                        <!-- Three Dots Dropdown -->
                        <div class="dropdown">
                            <button class="btn btn-light btn-dark" type="button" data-bs-toggle="dropdown">
                                <i class="bi bi-three-dots"></i>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="../community/post-upload.php">Edit your post</a></li>
                                <li><a class="dropdown-item" href="#">Delete your post</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>

        <?php include '../../_layout/footer.php' ?>

    </body>

</html>