<?php
session_start();
require_once '../../env_loader.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../../public/images/favico.png" type="image/png">
    <link rel="stylesheet" href="../../public/css/style.css">
    <link rel="stylesheet" href="../../public/css/bootstrap/5.1.3/bootstrap.min.css">
    <link rel="stylesheet" href="../../public/css/font-awesome/5.10.0/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="../../public/js/bootstrap/5.1.3/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

    <title>Educational Resources</title>
</head>
<header>
    <?php include '../../_layout/nav_bar.php' ?>
</header>

<body style="background: var(--primary);">
    <div class="container py-5">
        <h2 class="text-center mb-4">Download to Explore How Food relates with Renewable Energy</h2>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <div class="col">
                <div class="card h-100">
                    <div class="card-header text-center fw-bold">How To Create A Sustainable Kitchen</div>
                    <img src="../../public/images/EduResource1.jpg" class="card-img-top" alt="Recipe Image">
                    <div class="card-body text-start">
                        <p class="card-text">Creating a sustainable kitchen is a simple and effective way to reduce your environmental impact while improving your health and well-being. By choosing eco-friendly appliances, sustainable materials, and energy-efficient lighting, you can reduce your energy and water consumption, minimize waste, and create a healthier cooking space.</p>
                    </div>
                    <div class="card-footer text-center">
                        <a href="#" class="btn btn-primary">
                            <i class="bi bi-download"></i> Download
                        </a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                    <div class="card-header text-center fw-bold">Foods for Balancing Your Hormone</div>
                    <img src="../../public/images/EduResource2.jpg" class="card-img-top" alt="Recipe Image">
                    <div class="card-body text-start">
                        <p class="card-text">A balanced diet rich in whole foods, omega-3 fatty acids, and antioxidants can help support hormone balance. Include hormone-boosting foods like fatty fish, leafy greens, and berries in your meals, and limit hormone-disrupting foods like processed meats, soy products, and refined carbohydrates. Additionally, stay hydrated, manage stress, and get enough sleep to support overall hormone health.</p>
                    </div>
                    <div class="card-footer text-center">
                        <a href="#" class="btn btn-primary">
                            <i class="bi bi-download"></i> Download
                        </a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                    <div class="card-header text-center fw-bold">Non-Toxic Kitchen Swaps</div>
                    <img src="../../public/images/EduResource3.jpg" class="card-img-top" alt="Recipe Image">
                    <div class="card-body text-start">
                        <p class="card-text">Make the switch to a non-toxic kitchen with simple swaps. Replace plastic containers with glass or stainless steel, opt for beeswax wraps instead of plastic wrap, and choose ceramic or silicone utensils over metal or plastic. Additionally, switch to natural cleaning products or make your own using baking soda and vinegar. These small changes can significantly reduce your exposure to toxic chemicals and create a healthier cooking environment.</p>
                    </div>
                    <div class="card-footer text-center">
                        <a href="#" class="btn btn-primary">
                            <i class="bi bi-download"></i> Download
                        </a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                    <div class="card-header text-center fw-bold">How To Avoid Food Waste</div>
                    <img src="../../public/images/EduResource4.jpg" class="card-img-top" alt="Recipe Image">
                    <div class="card-body text-start">
                        <p class="card-text">Avoid food waste by planning your meals, making a grocery list, and sticking to it. Shop your fridge and pantry first to use up expiring items, and cook meals that use up leftovers. Freeze or compost food scraps, and use up imperfect produce in soups, stews, or smoothies. By being mindful of your food usage, you can reduce your environmental impact and save money on groceries.</p>
                    </div>
                    <div class="card-footer text-center">
                        <a href="#" class="btn btn-primary">
                            <i class="bi bi-download"></i> Download
                        </a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                    <div class="card-header text-center fw-bold">Quick Guide to Dark Leafy Greens</div>
                    <img src="../../public/images/EduResource5.jpg" class="card-img-top" alt="Recipe Image">
                    <div class="card-body text-start">
                        <p class="card-text">Dark leafy greens like kale, spinach, and collard greens are packed with nutrients and antioxidants. Rich in vitamins A, C, and K, they support eye health, immune function, and bone health. Add them to smoothies, salads, sautés, and soups for a boost of flavor and nutrition. With a quick rinse and chop, they're ready to elevate your meals and support overall well-being.</p>
                    </div>
                    <div class="card-footer text-center">
                        <a href="#" class="btn btn-primary">
                            <i class="bi bi-download"></i> Download
                        </a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                    <div class="card-header text-center fw-bold">Create An Eco-friendly Kitchen</div>
                    <img src="../../public/images/EduResource6.jpg" class="card-img-top" alt="Recipe Image">
                    <div class="card-body text-start">
                        <p class="card-text">Transform your kitchen into an eco-friendly oasis by swapping out plastic containers for glass or stainless steel, using reusable beeswax wraps instead of plastic wrap, and opting for energy-efficient appliances. Choose sustainable countertops and flooring, and install a water-efficient sink and faucet. By making these simple swaps, you can reduce your kitchen's environmental impact and create a healthier cooking space.</p>
                    </div>
                    <div class="card-footer text-center">
                        <a href="#" class="btn btn-primary">
                            <i class="bi bi-download"></i> Download
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Video -->
        <h2 class="text-center mt-5 mb-4">Know The Importance Of Renewable Energy</h2>
        <div class="row m-3 row-cols-1 row-cols-md-2 g-4">
            <div class="col">
                <div class="card h-100">
                    <div class="card-header text-center fw-bold">Creating A Perfect Farm</div>
                    <video class="card-img-top h-100" controls>
                        <source src="../../public/videos/Creating A Perfect Farm.mp4" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                    <div class="card-footer text-center">
                        <a href="#" class="btn btn-primary">
                            <i class="bi bi-download"></i> Download
                        </a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                    <div class="card-header text-center fw-bold">A life cycle of a cup of coffee</div>
                    <div class="ratio ratio-16x9">
                        <iframe width="560" height="315" src="https://www.youtube.com/embed/M0VWroX0gZA?si=KDBrCu-3czheVwqO" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                    </div>
                    <div class="card-footer text-center">
                        <a href="#" class="btn btn-primary">
                            <i class="bi bi-download"></i> Download
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Infographics -->
        <h2 class="text-center mb-4">Watch And Download Infographics</h2>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <div class="col">
                <div class="card h-100">
                    <div class="card-header text-center fw-bold">Process of Making Korean Kimchi</div>
                    <img src="../../public/images/info1.jpg" class="card-img-top" alt="Recipe Image">
                    <div class="card-body text-start">
                        <p class="card-text">Kimchi, a traditional Korean side dish, is made by fermenting a variety of vegetables, usually cabbage or radishes, with a spicy seasoning paste. The process begins with a thorough washing and cutting of the vegetables, followed by a mixture of Korean chili flakes, garlic, ginger, and fish sauce. The paste is then applied to the vegetables, which are left to ferment for several days or weeks, allowing the natural bacteria to break down the ingredients and create a tangy, sour flavor.</p>
                    </div>
                    <div class="card-footer text-center">
                        <a href="#" class="btn btn-primary">
                            <i class="bi bi-download"></i> Download
                        </a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                    <div class="card-header text-center fw-bold">Process of Making Delicious Pasta</div>
                    <img src="../../public/images/info3.jpg" class="card-img-top" alt="Recipe Image">
                    <div class="card-body text-start">
                        <p class="card-text">To make delicious pasta, start by boiling salted water and cooking your favorite pasta shape until al dente. Meanwhile, heat olive oil in a pan and sauté garlic, onions, and your choice of protein or vegetables. Add a can of crushed tomatoes and simmer the sauce until it thickens. Combine the cooked pasta with the sauce, tossing to coat, and top with grated Parmesan cheese and fresh basil leaves.</p>
                    </div>
                    <div class="card-footer text-center">
                        <a href="#" class="btn btn-primary">
                            <i class="bi bi-download"></i> Download
                        </a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                    <div class="card-header text-center fw-bold">Process of Making Korean Bibimbap</div>
                    <img src="../../public/images/info2.jpg" class="card-img-top" alt="Recipe Image">
                    <div class="card-body text-start">
                        <p class="card-text">Bibimbap, a popular Korean rice bowl dish, is made by cooking a variety of vegetables, such as bean sprouts, zucchini, and mushrooms, in a savory broth. A bed of warm white rice is then topped with the vegetables, a fried egg, and a spicy chili pepper paste called gochujang. The dish is finished with a drizzle of soy sauce and a sprinkle of toasted sesame seeds, creating a harmonious balance of flavors and textures.</p>
                    </div>
                    <div class="card-footer text-center">
                        <a href="#" class="btn btn-primary">
                            <i class="bi bi-download"></i> Download
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include '../../_layout/footer.php' ?>
</body>

</html>