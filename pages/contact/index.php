<?php

use Bb\Blendingbites\Libs\Database\EnquiriesTable;
use Bb\Blendingbites\Libs\Database\MySQL;

require_once '../../env_loader.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = [

        'name' => $_POST['first_name'] . $_POST['last_name'],
        'email' => $_POST['email'],
        'phone' => $_POST['phone'],
        'message' => $_POST['message'],
    ];
    $enquiriesTable = new EnquiriesTable(new MySQL());

    try {
        $enquiriesTable->insert($data);
        $_GET['success'] = "Your message has been sent. Thank you for your message!";
    } catch (\Throwable $th) {
        $_GET['error'] = $th->getMessage();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<header>
    <?php include '../../_layout/nav_bar.php' ?>
</header>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="../../public/css/style.css">
    <link rel="shortcut icon" href="../../public/images/favico.png" type="image/png">
    <link rel="stylesheet" href="../../public/css/bootstrap/5.1.3/bootstrap.min.css">
    <link rel="stylesheet" href="../../public/css/font-awesome/5.10.0/all.min.css">
    <script src="../../public/js/bootstrap/5.1.3/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            background-color: rgb(210, 201, 201);
        }

        .form-field:focus {
            outline: none;
            border-color: black;
            box-shadow: 0 0 5px black;
        }
    </style>


</head>

<body>
    <section>
        <div class="container py-5">
            <div class="row">
                <!-- Left Column: Introduction and Contact Information -->
                <div class="col-md-6 mb-4">
                    <h2>Contact Us</h2>
                    <p>"Thank you for visiting our website! If you have any questions, feedback, or require assistance with our products or services, please don't hesitate to contact us. Our dedicated team is here to help and provide you with the support you need. Simply fill out the form below or contact us directly, and we'll be in touch soon."</p>

                    <!-- Vertical Contact List -->
                    <ul class="list-unstyled">
                        <li class="mb-3">
                            <i class="bi bi-geo-alt-fill text-danger me-2"></i>
                            <strong>Address:</strong> 1234 Main Street, Cityville, USA
                        </li>
                        <li class="mb-3">
                            <i class="bi bi-telephone-fill text-danger me-2"></i>
                            <strong>Phone:</strong> (123) 456-7890
                        </li>
                        <li class="mb-3">
                            <i class="bi bi-envelope-fill text-danger me-2"></i>
                            <strong>Email:</strong> contact@company.com
                        </li>
                    </ul>

                    <!-- Horizontal Social Media Links -->
                    <div class="d-flex">
                        <a href="#" class="me-3 text-decoration-none text-dark">
                            <i class="bi bi-facebook text-primary"></i>
                        </a>
                        <a href="#" class="me-3 text-decoration-none text-dark">
                            <i class="bi bi-instagram text-danger"></i>
                        </a>
                        <a href="#" class="me-3 text-decoration-none text-dark">
                            <i class="bi bi-twitter text-info"></i>
                        </a>
                        <a href="#" class="text-decoration-none text-dark">
                            <i class="bi bi-linkedin text-primary"></i>
                        </a>
                    </div>
                </div>

                <!-- Right Column: Contact Form -->
                <div class="col-md-6">
                    <h3>Send Us a Message</h3>
                    <?php if (isset($_GET['error'])): ?>
                        <div class="alert alert-danger">
                            <?= $_GET['error'] ?>
                        </div>
                    <?php endif ?>
                    <?php if (isset($_GET['success'])): ?>
                        <div class="alert alert-success">
                            <?= $_GET['success'] ?>
                        </div>
                    <?php endif ?>
                    <form class="p-4 shadow-lg rounded" style="background-color: #f9f9f9;" method="post">
                        <div class="row g-3 mb-3">
                            <!-- First Name -->
                            <div class="col-md-6">
                                <label for="firstName" class="form-label">First Name</label>
                                <input type="text" name="first_name" class="form-control form-field" id="firstName" placeholder="Your First Name" required>
                            </div>
                            <!-- Last Name -->
                            <div class="col-md-6">
                                <label for="lastName" class="form-label">Last Name</label>
                                <input type="text" name="last_name" class="form-control form-field" id="lastName" placeholder="Your Last Name" required>
                            </div>
                        </div>
                        <!-- Email Address -->
                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="email" name="email" class="form-control form-field" id="email" placeholder="name@example.com" required>
                        </div>
                        <!-- Phone Number -->
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone Number</label>
                            <input type="text" name="phone" class="form-control form-field" id="phone" placeholder="Your Phone Number" required>
                        </div>
                        <!-- Message -->
                        <div class="mb-3">
                            <label for="message" class="form-label">Message</label>
                            <textarea class="form-control form-field" name="message" id="message" rows="5" placeholder="Your Message" required></textarea>
                        </div>
                        <!-- Privacy Policy Checkbox -->
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="privacyPolicy" required>
                            <label class="form-check-label" for="privacyPolicy">I agree to the privacy policy</label>
                        </div>
                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-outline-primary text-black w-100">Send Message</button>
                    </form>
                </div>
                <div class="container py-5">
                    <div class="row">
                        <div class="col-12">
                            <!-- Map -->
                            <h3 class="text-center">Find Us Here</h3>
                            <p class="text-center mb-4">
                                Our office is located at the heart of the city, making it convenient for you to reach us. Visit us to discuss your queries or simply drop by for a chat!
                            </p>
                            <div class="map-container mb-4" style="position: relative; overflow: hidden;">
                                <iframe
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3151.8354345096765!2d144.95373531532026!3d-37.81627944202798!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad642af0f11fd81%3A0x5045675218ce840!2sMelbourne%20VIC%2C%20Australia!5e0!3m2!1sen!2sus!4v1630918240961!5m2!1sen!2sus"
                                    width="100%"
                                    height="400"
                                    style="border: 0;"
                                    allowfullscreen=""
                                    loading="lazy">
                                </iframe>
                            </div>
                            <p class="text-center mt-4">
                                Need directions? Use the map above to find the quickest route to our office. We look forward to welcoming you!
                            </p>
                        </div>
                    </div>
                </div>

    </section>
    <?php include '../../_layout/footer.php' ?>
</body>

</html>