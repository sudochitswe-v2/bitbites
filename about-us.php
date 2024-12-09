<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - FoodFusion</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap/5.1.3/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome/5.10.0/all.min.css">
    <script src="js/boostrap/5.1.3/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">

    <style>
        body {
            background-color: #F5F5DC;
        }

        .about-us-section {
            position: relative;
            height: 100vh;
            background: url('images/desert.jpg') no-repeat center center/cover;
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        .about-us-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.7);

        }

        .about-us-content {
            position: relative;
            z-index: 2;
            padding: 20px;
        }

        .about-us-content h1 {
            font-size: 3rem;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .about-us-content p {
            font-size: 1.25rem;
            line-height: 1.8;
            max-width: 800px;
            margin: 0 auto;
        }

        /* Add subtle hover effects for images */
        .img-fluid {
            transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
        }

        .img-fluid:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        /* Styling for the right column text */
        ul {
            list-style-type: none;
            padding: 0;
        }

        .values li {
            position: relative;
            padding-left: 1.5rem;
            margin-bottom: 0.5rem;
        }

        .values li::before {
            content: "o";
            position: absolute;
            left: 0;
            color: #8b5e34;
            font-size: 1rem;
        }

        /* Button hover effect */
        .btn-outline-dark {
            transition: background-color 0.3s ease-in-out, color 0.3s ease-in-out;
        }

        .btn-outline-dark:hover {
            background-color: #8b5e34;
            color: #fff;
        }

        /* Team Card Styling */
        .team-card {
            text-align: center;
            position: relative;
        }

        .team-image-wrapper {
            position: relative;
            overflow: hidden;
            border-radius: 8px;
        }

        .team-image-wrapper img {
            width: 100%;
            height: auto;
            object-fit: cover;
            transition: transform 0.3s ease-in-out;
        }

        .team-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.7);
            color: #fff;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            opacity: 0;
            transition: opacity 0.3s ease-in-out;
        }

        .team-overlay p {
            margin-bottom: 1rem;
        }

        .social-links a {
            color: #fff;
            margin: 0 0.5rem;
            font-size: 1.5rem;
            transition: color 0.3s ease-in-out;
        }

        .social-links a:hover {
            color: #8b5e34;
            /* Highlight color on hover */
        }

        /* Hover Effects */
        .team-image-wrapper:hover img {
            transform: scale(1.1);
        }

        .team-image-wrapper:hover .team-overlay {
            opacity: 1;
        }

        /* Name Styling */
        .team-card p {
            font-weight: bold;
            margin-top: 1rem;
        }
    </style>

</head>

<header>
    <?php include '_layout/nav_bar.php'; ?>
</header>

<body>

    <!-- About Us Section -->
    <section class="about-us-section">
        <div class="about-us-overlay"></div>
        <div class="about-us-content">
            <h1>Our Mission & Vision</h1>
            <p>
                At FoodFusion, our mission is to bring people together by celebrating culinary creativity from around the globe.
                We aim to blend diverse flavors, cultures, and experiences into a unique dining adventure.
            </p>
            <p>
                Our vision is to become a global leader in food innovation, inspiring communities to embrace diversity through shared meals and unforgettable experiences.
            </p>
        </div>
    </section>

    <div class="container my-5">
        <div class="row align-items-center">
            <!-- Left Column: 3 Pictures -->
            <div class="col-md-6">
                <div class="row g-3">
                    <div class="col-12" data-aos="fade-up">
                        <img src="images/cp3.jpg" alt="Culinary Philosophy 1" class="img-fluid rounded">
                    </div>
                    <div class="col-6" data-aos="fade-up" data-aos-delay="100">
                        <img src="images/cp2.jpg" alt="Culinary Philosophy 2" class="img-fluid rounded">
                    </div>
                    <div class="col-6" data-aos="fade-up" data-aos-delay="200">
                        <img src="images/cp1.jpg" alt="Culinary Philosophy 3" class="img-fluid rounded">
                    </div>
                </div>
            </div>

            <!-- Right Column: Information -->
            <div class="col-md-6" data-aos="fade-up" data-aos-delay="300">
                <h2>Our Culinary Philosophy</h2>
                <p>
                    At FoodFusion, we believe in blending traditional techniques with modern creativity.
                    Our approach celebrates cultural diversity and culinary innovation, creating dishes that
                    connect people and spark joy.
                </p>
                <h4>Core Values</h4>
                <ul class="values">
                    <li><strong>Quality:</strong> Using the finest ingredients to craft exceptional dishes.</li>
                    <li><strong>Inclusivity:</strong> Embracing diverse cuisines and cultures.</li>
                    <li><strong>Innovation:</strong> Redefining culinary boundaries with bold ideas.</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="container my-5">
        <h2 class="text-center mb-4">Meet Our Team</h2>
        <div class="row g-4">
            <!-- Team Member 1 -->
            <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="team-card">
                    <div class="team-image-wrapper">
                        <img src="https://xsgames.co/randomusers/assets/avatars/female/48.jpg" alt="Team Member 1" class="img-fluid rounded">
                        <div class="team-overlay">
                            <p class="team-role">Chef & Recipe Creator</p>
                            <div class="social-links">
                                <a href="https://linkedin.com" target="_blank"><i class="fab fa-linkedin"></i></a>
                                <a href="https://twitter.com" target="_blank"><i class="fab fa-twitter"></i></a>
                                <a href="https://instagram.com" target="_blank"><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                    <p class="text-center mt-2">John Doe</p>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="team-card">
                    <div class="team-image-wrapper">
                        <img src="https://xsgames.co/randomusers/assets/avatars/female/49.jpg" alt="Team Member 1" class="img-fluid rounded">
                        <div class="team-overlay">
                            <p class="team-role">Chef & Recipe Creator</p>
                            <div class="social-links">
                                <a href="https://linkedin.com" target="_blank"><i class="fab fa-linkedin"></i></a>
                                <a href="https://twitter.com" target="_blank"><i class="fab fa-twitter"></i></a>
                                <a href="https://instagram.com" target="_blank"><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                    <p class="text-center mt-2">John Doe</p>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="team-card">
                    <div class="team-image-wrapper">
                        <img src="https://xsgames.co/randomusers/assets/avatars/female/32.jpg" alt="Team Member 1" class="img-fluid rounded">
                        <div class="team-overlay">
                            <p class="team-role">Chef & Recipe Creator</p>
                            <div class="social-links">
                                <a href="https://linkedin.com" target="_blank"><i class="fab fa-linkedin"></i></a>
                                <a href="https://twitter.com" target="_blank"><i class="fab fa-twitter"></i></a>
                                <a href="https://instagram.com" target="_blank"><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                    <p class="text-center mt-2">John Doe</p>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="team-card">
                    <div class="team-image-wrapper">
                        <img src="https://xsgames.co/randomusers/assets/avatars/female/35.jpg" alt="Team Member 1" class="img-fluid rounded">
                        <div class="team-overlay">
                            <p class="team-role">Chef & Recipe Creator</p>
                            <div class="social-links">
                                <a href="https://linkedin.com" target="_blank"><i class="fab fa-linkedin"></i></a>
                                <a href="https://twitter.com" target="_blank"><i class="fab fa-twitter"></i></a>
                                <a href="https://instagram.com" target="_blank"><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                    <p class="text-center mt-2">John Doe</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init();
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });
    </script>

    <?php include '_layout/footer.php' ?>

</body>

</html>