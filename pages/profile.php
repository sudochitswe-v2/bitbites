<!DOCTYPE html>
<html lang="en">
<header>
    <?php
    include '_nav.php'
    ?>
</header>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/bootstrap/5.1.3/bootstrap.min.css">
    <link rel="stylesheet" href="../css/font-awesome/5.10.0/all.min.css">
    <script src="../js/bootstrap/5.1.3/bootstrap.min.js"></script>
    <title>User Profile</title>
</head>

<body>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6">

                <div class="border rounded p-4">

                    <div class="text-center mb-4">
                        <img src="../public/images/bg.jpg" alt="Profile Picture" class="rounded-circle img-fluid" style="width: 150px; height: 150px;">
                    </div>

                    <div class="mb-3">
                        <p><strong>User Name:</strong> John Doe</p>
                        <p><strong>Role:</strong> Administrator</p>
                        <p><strong>Mobile Phone:</strong> +1234567890</p>
                        <p><strong>Email Address:</strong> johndoe@example.com</p>
                    </div>

                    <div class="text-center">
                        <button class="btn btn-outline-primary text-black d-inline-flex align-items-center">
                            <i class="fa fa-edit me-2"></i> Edit Information
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include '../_layout/footer.php' ?>
</body>

</html>