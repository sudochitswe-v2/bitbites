<!DOCTYPE html>
<html>

<head>
    <title>Register</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../css/bootstrap/5.1.3/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <style>
        .wrap {
            width: 100%;
            max-width: 400px;
            margin: 40px auto;
        }

        .image-preview-container {
            position: relative;
            height: 100px;
        }

        .image-preview {
            width: 100px;
            height: 100px;
            border: 2px dashed black;
            display: fkex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            background-size: cover;
            background-position: center;
            background-color: white;
        }

        .image-preview span {
            color: #888;

        }
    </style>
</head>

<body class="text-center">
    <div class="wrap">
        <h1 class="h3 mb-3">Register</h1>

        <?php if (isset($_GET['error'])) : ?>
            <div class="alert alert-warning">
                <?= $_GET['error'] ?>
            </div>
        <?php endif ?>

        <form action="../_actions/users/register.php" method="post" enctype="multipart/form-data">
            <div class="image-preview-container">
                <label for="image" class="image-preview" id="imagePreview">
                    <span>Click to Uplode Photo</span>
                </label>
                <input type="file" name="image" id="image" class="form-control"
                    accept="image/*" required style="display: none;">
            </div>
            <br>
            <input type="text" name="first_name" class="form-control mb-2" placeholder="First Name" required>

            <input type="text" name="last_name" class="form-control mb-2" placeholder="Last Name" required>

            <input type="text" name="phone" class="form-control mb-2" placeholder="Phone Number" required>

            <input type="email" name="email" class="form-control mb-2" placeholder="Email Address" required>

            <input type="password" name="password" class="form-control mb-2" placeholder="Password" required>

            <button type="submit" class="w-100 btn btn-lg btn-primary text-black">
                Register
            </button>
        </form>
        <br>

        <a href="login.php">Login</a> <br>
        <a href="../index.php">Back To Home</a>
    </div>
</body>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const imageInput = document.getElementById('image');
        const preview = document.getElementById('imagePreview');

        if (imageInput) {
            imageInput.addEventListener('change', function(event) {
                const file = event.target.files[0];

                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        preview.style.backgroundImage = `url(${e.target.result})`;
                        preview.innerHTML = ''; // Remove the placeholder text
                    };
                    reader.readAsDataURL(file);
                }
            });
        }
    });
</script>

</html>