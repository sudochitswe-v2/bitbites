<?php


use Bb\Blendingbites\Libs\Database\MySQL;
use Bb\Blendingbites\Libs\Database\EnquiriesTable;

require '../../env_loader.php';

$messages = new EnquiriesTable(new MySQL());
$sentmessages = $messages->getAll();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/css/bootstrap/5.1.3/bootstrap.min.css">
    <link rel="stylesheet" href="../../public/css/style.css">
    <link rel="shortcut icon" href="../../public/images/favico.png" type="image/png">
    <link rel="stylesheet" href="../../public/css/bootstrap/5.1.3/bootstrap.min.css">
    <link rel="stylesheet" href="../../public/css/font-awesome/5.10.0/all.min.css">
    <script src="../public/js/bootstrap/5.1.3/bootstrap.min.js"></script>
    <title>Enquiries</title>
</head>

<body>
    <div class="d-flex vh-100">
        <?php include '../_shared/_nav.php' ?>
        <div class="container mt-5">
            <h2 class="text-start mb-4">Enquiries</h2>
            <div class="card border rounded p-3 shadow">
                <div class="row bg-gradient bg-primary text-white p-3 rounded">
                    <div class="col-md-4"><strong>User Information</strong></div>
                    <div class="col-md-8"><strong>Message</strong></div>
                </div>

                <!-- User Entry -->
                <?php foreach ($sentmessages as $message): ?>
                    <div class="row border-bottom py-3">
                        <div class="col-md-4">
                            <p><strong>Name:</strong> <?= htmlspecialchars($message['name']) ?></p>
                            <p><strong>Phone:</strong> <?= htmlspecialchars($message['phone']) ?></p>
                            <p><strong>Email:</strong> <?= htmlspecialchars($message['email']) ?></p>
                        </div>
                        <div class="col-md-8">
                            <div class="border rounded p-3 bg-light">
                                <?= htmlspecialchars($message['message']) ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</body>

</html>