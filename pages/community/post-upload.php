<?php
session_start();

use Bb\Blendingbites\Helpers\Auth;
use Bb\Blendingbites\Helpers\HTTP;
use Bb\Blendingbites\Helpers\ImageHandler;
use Bb\Blendingbites\Libs\Database\MySQL;
use Bb\Blendingbites\Libs\Database\PostsTable;

require '../../env_loader.php';

Auth::needLogin();

// Initialize the database connection and PostsTable
$db = new MySQL();
$postsTable = new PostsTable($db);

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the form data
    $postId = $_POST['post_id'] ?? null;
    $content = $_POST['content'] ?? '';
    $userId = Auth::check()->id;

    // Handle image upload
    $image = null;
    if (isset($_FILES["image"]) && $_FILES["image"]["size"] != 0) {
        $image = ImageHandler::upload($_FILES);
    }

    // Prepare the data array
    $data = [
        'content' => $content,
        'image' => $image,
        'user_id' => $userId
    ];

    // If post_id is provided, update the existing post
    try {
        if ($postId) {
            $data['id'] = $postId;
            $success = $postsTable->update($data);
        } else {
            // Otherwise, insert a new post
            $success = $postsTable->insert($data);
        }

        HTTP::redirect('/pages/community/index.php');
    } catch (\Throwable $th) {
        echo $th->getMessage();
    }
}
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
    <script src="../../public/js/bootstrap/5.1.3/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <title>Upload Post</title>
</head>
<header>
    <?php include '../../_layout/nav_bar.php'; ?>
</header>

<body>
    <div class="container py-4 justify-content-center col-md-6">

        <!-- User Upload Card -->
        <div class="border rounded p-3 bg-light">

            <!-- Title -->
            <h5 class="fw-bold mb-3">What's On Your Mind?</h5>

            <!-- User Input Form -->
            <form action="post-upload.php" method="POST" enctype="multipart/form-data">
                <!-- Hidden input for post_id -->
                <input type="hidden" name="post_id" value="<?= isset($post['id']) ? $post['id'] : '' ?>">

                <!-- Text Input for Content -->
                <div class="mb-3">
                    <textarea class="form-control" rows="3" placeholder="Share your thoughts..." name="content"><?php echo $content ?? ''; ?></textarea>
                </div>

                <!-- Upload Image -->
                <div class="mb-3 d-flex align-items-center">
                    <label for="imageUpload" class="btn btn-dark me-2">
                        <i class="bi bi-image"></i> Upload Image
                    </label>
                    <input type="file" id="imageUpload" name="image" class="d-none">
                    <span id="file-name" class="text-muted"></span>
                </div>

                <!-- Submit Button -->
                <div class="text-end">
                    <button type="submit" class="btn btn-dark">
                        Share <i class="bi bi-send"></i>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <script>
        // Display selected file name
        document.getElementById("imageUpload").addEventListener("change", function() {
            let fileName = this.files[0] ? this.files[0].name : "";
            document.getElementById("file-name").textContent = fileName;
        });
    </script>


    <?php include '../../_layout/footer.php' ?>
</body>

</html>