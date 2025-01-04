<!DOCTYPE html>
<html lang="en">
<header>
    <?php
    require_once '../../../env_loader.php';
    include '../../../_layout/nav_bar.php'
    ?>
</header>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../public/css/style.css">
    <link rel="stylesheet" href="../../../public/css/bootstrap/5.1.3/bootstrap.min.css">
    <link rel="stylesheet" href="../../../public/css/font-awesome/5.10.0/all.min.css">
    <script src="../../../public/js/bootstrap/5.1.3/bootstrap.min.js"></script>
    <title>Edit Profile</title>
</head>

<body>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <!-- Profile Edit Box -->
                <div class="border rounded p-4">
                    <!-- Profile Image and Upload Button -->
                    <div class="text-center mb-4">
                        <img src="https://via.placeholder.com/150" alt="Profile Picture" class="rounded-circle img-fluid" style="width: 150px; height: 150px;">
                        <div class="mt-3">
                            <button class="btn btn-outline-primary text-black btn-sm">
                                <i class="bi bi-upload me-2"></i> Upload New Photo
                            </button>
                        </div>
                    </div>

                    <!-- Profile Edit Fields -->
                    <form>
                        <div class="mb-3">
                            <label for="username" class="form-label"><strong>User Name</strong></label>
                            <input type="text" class="form-control" id="username" value="John Doe">
                        </div>
                        <div class="mb-3">
                            <label for="role" class="form-label"><strong>Role</strong></label>
                            <input type="text" class="form-control" id="role" value="Administrator">
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label"><strong>Mobile Phone</strong></label>
                            <input type="tel" class="form-control" id="phone" value="+1234567890">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label"><strong>Email Address</strong></label>
                            <input type="email" class="form-control" id="email" value="johndoe@example.com">
                        </div>

                        <!-- Action Buttons -->
                        <div class="text-end mt-4">
                            <button type="button" class="btn btn-secondary me-2">Cancel</button>
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-check-circle me-2"></i> Save Changes
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <?php include '../../../_layout/footer.php' ?>
</body>

</html>