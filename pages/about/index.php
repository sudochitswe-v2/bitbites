<!DOCTYPE html>
<html lang="en">

<header>

    <?php
    require_once '../../env_loader.php';
    include '../../_layout/nav_bar.php'
    ?>
</header>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../../public/images/favico.png" type="image/png">
    <title>About Us - FoodFusion</title>
    <link rel="stylesheet" href="../../public/css/style.css">
    <link rel="stylesheet" href="../../public/css/bootstrap/5.1.3/bootstrap.min.css">
    <link rel="stylesheet" href="../../public/css/font-awesome/5.10.0/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <script src="../../public/js/bootstrap/5.1.3/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">

    <style>
        .about-us-section {
            position: relative;
            height: 100vh;
            background: url('../../public/images/about.jpg') no-repeat center center/cover;
            color: black;
            display: flex;
            justify-content: right;
            align-items: center;
            text-align: center;
        }

        .about-us-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(59, 47, 47, 0.72);

        }

        .about-us-content {
            position: relative;
            z-index: 2;
            padding: 10px;
            justify-content: center;
        }

        .about-us-content h1 {
            font-size: 3rem;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .about-us-content p {
            font-size: 1.25rem;
            line-height: 1.8;
            max-width: 800px;
            margin: 0 auto;
        }

        .img-fluid {
            transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
        }

        .img-fluid:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 16px rgba(45, 44, 44, 0.2);
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
            background-color: rgb(22, 14, 6);
            color: #fff;
        }

        .team-card {
            transition: all 0.3s ease;
            text-align: center;
            position: relative;
            padding: 15px;
            border-radius: 20px;
        }

        .team-card:hover {
            background-color: rgb(22, 24, 28);
            color: #fff;
        }

        .team-card img {
            border-radius: 50%;
            width: 100px;
            height: 100px;
            object-fit: cover;
        }

        .social-icons a {
            color: inherit;
            margin: 0 5px;
            font-size: 18px;
            text-decoration: none;
        }

        .social-icons a:hover {
            color: #fff;
        }
    </style>
</head>

<body style="background: var(--primary);">

    <!-- About Us Section -->
    <section class="about-us-section">
        <div class="about-us-overlay"></div>
        <div class="about-us-content">
            <h1>Our Mission</h1>
            <p>
                "To empower home cooks to share their stories and connect with others through the universal language of food, by providing a platform that celebrates quality, inclusivity, and innovation in cooking."
            </p>
            </br>
            <h1>Our Vision</h1>
            <p>
                "To become the go-to destination for home cooks to discover, share, and celebrate their favorite recipes, and to inspire a global community of cooks to come together and create a more delicious, diverse, and connected world."
            </p>
        </div>
    </section>

    <div class="container my-5">
        <div class="row align-items-center">
            <!-- Left Column: 3 Pictures -->
            <div class="col-md-6">
                <div class="row g-3">
                    <div class="col-6" data-aos="fade-up">
                        <img src="../../public/images/cp4.jpg" alt="Culinary Philosophy 1" class="img-fluid rounded">
                    </div>
                    <div class="col-6" data-aos="fade-up">
                        <img src="../../public/images/cp3.jpg" alt="Culinary Philosophy 1" class="img-fluid rounded">
                    </div>
                    <div class="col-6" data-aos="fade-up" data-aos-delay="100">
                        <img src="../../public/images/cp2.jpg" alt="Culinary Philosophy 2" class="img-fluid rounded">
                    </div>
                    <div class="col-6" data-aos="fade-up" data-aos-delay="200">
                        <img src="../../public/images/cp1.jpg" alt="Culinary Philosophy 3" class="img-fluid rounded">
                    </div>
                </div>
            </div>

            <!-- Right Column: Information -->
            <div class="col-md-6 mt-3" data-aos="fade-up" data-aos-delay="300">
                <h2>Our Culinary Philosophy</h2>
                <p>
                    "At the heart of our culinary philosophy is a passion for creativity, quality, and community.
                    We believe that food should be a celebration of life's simple pleasures, bringing people together and nourishing both body and soul.
                    Our chefs are dedicated to crafting dishes that are not only delicious, but also visually stunning and thoughtfully sourced.
                    We're committed to using only the freshest, locally-sourced ingredients and innovative techniques to create menus that are both familiar and excitingly new. Whether you're joining us for a casual meal or a special occasion, we're dedicated to providing an unforgettable culinary experience that leaves you feeling satisfied, inspired, and eager to return."</P>
                <h4>Core Values</h4>
                <ul class="values">
                    <p>"At FoodFusion, we're passionate about creating a community that celebrates the art of cooking. Our core values reflect our commitment to delivering a unique and exceptional experience for our users.</p>
                    <li><strong>Quality:</strong> Quality is at the heart of everything we do, as we believe that the best recipes start with the freshest ingredients and a dash of love. </li>
                    <li><strong>Inclusivity:</strong> Inclusivity is also a core value, as we welcome recipes from home cooks of all backgrounds and cuisines. Whether you're a seasoned chef or a culinary newbie, we believe that everyone has a story to tell through food.</li>
                    <li><strong>Innovation:</strong> Innovation drives us to constantly push the boundaries of what's possible with food. We're always on the lookout for new techniques, ingredients, and inspiration to help our users take their cooking to the next level.</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="container py-10">
        <h2 class="text-start mb-10"><strong>Meet Our Team</strong></h2>
        <p>At Food Fusion, it takes a talented and dedicated team to bring our vision to life. Each member of our team plays a vital role in creating a seamless and delightful experience for our audience, from recipe lovers to culinary explorers.</p>
        <div class="row justify-content-center gy-4">
            <!-- Team Member 1 -->
            <div class="col-md-3">
                <div class="team-card p-3 shadow">
                    <img src="../../public/images/avater1.jpg" alt="Team Member">
                    <h5 class="mt-3">Emma</h5>
                    <p>Frontend Developer</p>
                    <div class="social-icons">
                        <a href="#"><i class="bi bi-facebook"></i></a>
                        <a href="#"><i class="bi bi-twitter"></i></a>
                        <a href="#"><i class="bi bi-instagram"></i></a>
                    </div>
                </div>
            </div>

            <!-- Team Member 2 -->
            <div class="col-md-3">
                <div class="team-card p-3 shadow">
                    <img src="../../public/images/avater2.jpg" alt="Team Member">
                    <h5 class="mt-3">Kevin</h5>
                    <p>Backend Developer</p>
                    <div class="social-icons">
                        <a href="#"><i class="bi bi-facebook"></i></a>
                        <a href="#"><i class="bi bi-twitter"></i></a>
                        <a href="#"><i class="bi bi-instagram"></i></a>
                    </div>
                </div>
            </div>

            <!-- Team Member 3 -->
            <div class="col-md-3">
                <div class="team-card p-3 shadow">
                    <img src="../../public/images/avater3.jpg" alt="Team Member">
                    <h5 class="mt-3">Lei Lei</h5>
                    <p>Admin</p>
                    <div class="social-icons">
                        <a href="#"><i class="bi bi-facebook"></i></a>
                        <a href="#"><i class="bi bi-twitter"></i></a>
                        <a href="#"><i class="bi bi-instagram"></i></a>
                    </div>
                </div>
            </div>

            <!-- Team Member 4 -->
            <div class="col-md-3">
                <div class="team-card p-3 shadow">
                    <img src="../../public/images/avater4.jpg" alt="Team Member">
                    <h5 class="mt-3">Seinn
                    <p>Project Manager</p>
                    <div class="social-icons">
                        <a href="#"><i class="bi bi-facebook"></i></a>
                        <a href="#"><i class="bi bi-twitter"></i></a>
                        <a href="#"><i class="bi bi-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <div class="text-start fs-6 px-5">
            <p>
            <ul class>
                <li><strong>Emma</strong>: Crafting the visual magic of our website, our front-end designer ensures an intuitive and stunning user experience, bringing every click and scroll to life with vibrant design and creativity.</li>
                <br>
                <li><strong>Kevin</strong>: Behind the scenes, our back-end developer ensures that Food Fusion runs smoothly and efficiently, managing the technical side to provide a seamless digital experience.</li>
                <br>
                <li><strong>Lei Lei</strong>: The backbone of our operations, our admin oversees day-to-day tasks and keeps everything organized, ensuring Food Fusion stays on track and thriving.</li>
                <br>
                <li><strong> Seinn</strong>: Leading the charge, our General Manager combines strategic vision with operational excellence to ensure that Food Fusion continues to innovate and inspire in the culinary world.
                    <br>
            </ul>
            <h5 class="text-center"><Strong>"Together, our team works with passion and dedication to bring you the best of Food Fusion."</strong></h5>
            </p>
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

        <?php include '../../_layout/footer.php' ?>

</body>

</html>