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

        <form action="_actions/users/register.php" method="post">
            <input type="text" name="name" class="form-control mb-2" placeholder="Name" required>

            <input type="email" name="email" class="form-control mb-2" placeholder="Email" required>

            <input type="text" name="phone" class="form-control mb-2" placeholder="Phone" required>

            <textarea name="address" class="form-control mb-2" placeholder="Address" required></textarea>

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

</html>