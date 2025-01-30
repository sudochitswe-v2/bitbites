<?php require_once '../../env_loader.php'; ?>

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
    <script src="../../public/js/bootstrap/5.1.3/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

    <title>Culinary Resources</title>
</head>

<header>
    <?php include '../../_layout/nav_bar.php' ?>
</header>

<body style="background: var(--primary);">
    <div class="container py-5">
        <h2 class="text-center mb-4">Download Your Favourite Recipe Card</h2>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <div class="col">
                <div class="card h-100">
                    <div class="card-header text-center fw-bold">Chicken Salad</div>
                    <img src="../../public/images/Recipe Card(1).jpg" class="card-img-top h-100" alt="Recipe Image">
                    <div class="card-body text-center">
                        <p class="card-text">Ingredients & Directions of Chicken Salad</p>
                    </div>
                    <div class="card-footer text-center">
                        <a href="../../public/images/Recipe Card(1).jpg" class="btn btn-primary" download="#">
                            <i class="bi bi-download"></i> Download
                        </a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                    <div class="card-header text-center fw-bold">Sweet Apple Squares</div>
                    <img src="../../public/images/Recipe Card(2).jpg" class="card-img-top" alt="Recipe Image">
                    <div class="card-body text-center">
                        <p class="card-text">Ingredients & Directions of Sweet Apple Squares</p>
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
                    <div class="card-header text-center fw-bold">Fresh Couscous Salad</div>
                    <img src="../../public/images/Recipe Card(3).jpg" class="card-img-top" alt="Recipe Image">
                    <div class="card-body text-center">
                        <p class="card-text">Ingredients & Directions of Fresh Couscous Salad</p>
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
                    <div class="card-header text-center fw-bold">Creamy Pasta</div>
                    <img src="../../public/images/Recipe Card(4).jpg" class="card-img-top" alt="Recipe Image">
                    <div class="card-body text-center">
                        <p class="card-text">Ingredients & Directions of Creamy Pasta</p>
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
                    <div class="card-header text-center fw-bold">Chocolate Cake</div>
                    <img src="../../public/images/Recipe Card(5).jpg" class="card-img-top" alt="Recipe Image">
                    <div class="card-body text-center">
                        <p class="card-text">Ingredients & Directions of Chocolate Cake</p>
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
                    <div class="card-header text-center fw-bold">Traditional Christmas Pudding</div>
                    <img src="../../public/images/Recipe Card(6).jpg" class="card-img-top" alt="Recipe Image">
                    <div class="card-body text-center">
                        <p class="card-text">Ingredients & Directions of Traditional Christmas Pudding</p>
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
                    <div class="card-header text-center fw-bold">Fruit Salad</div>
                    <img src="../../public/images/Recipe Card(7).jpg" class="card-img-top" alt="Recipe Image">
                    <div class="card-body text-center">
                        <p class="card-text">Ingredients & Directions of Fruit Salad</p>
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
                    <div class="card-header text-center fw-bold">Vegetable Pirogue</div>
                    <img src="../../public/images/Recipe Card(8).jpg" class="card-img-top" alt="Recipe Image">
                    <div class="card-body text-center">
                        <p class="card-text">Ingredients & Directions of Vegetable Pirogue</p>
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
                    <div class="card-header text-center fw-bold">Vanilla Ice Cream</div>
                    <img src="../../public/images/Recipe Card(9).jpg" class="card-img-top" alt="Recipe Image">
                    <div class="card-body text-center">
                        <p class="card-text">Ingredients & Directions of Vanilla Ice Cream</p>
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

    <!-- cooking tutorial section -->
    <h2 class="text-center mt-5 mb-4">Cooking Tutorials & Industrial Videos</h2>
    <div class="row m-3 row-cols-1 row-cols-md-2 g-4">
        <div class="col">
            <div class="card h-100">
                <div class="card-header text-center fw-bold">Fluffy and Delicious Japanese street food </div>
                <video class="card-img-top h-100" controls>
                    <source src="../../public/videos/utomp3.com - Fluffy and Delicious Japanese street food 1 Cheap ingredients Easy homemade Souffle pancake_v720P.mp4" type="video/mp4">
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
                <div class="card-header text-center fw-bold">Video Name</div>
                <div class="ratio ratio-16x9">
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/rCvDPxahmyY?si=QGXMshoaZXvu3ccw" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
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
                <div class="card-header text-center fw-bold">KOREAN SWEET CHILI CHICKEN </div>
                <div class="ratio ratio-16x9">
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/LqJFx6aMO2Q?si=qr1GccUDTuOORSrh" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
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
                <div class="card-header text-center fw-bold">Easy Carbonara Recipe Japanese Style</div>
                <video class="card-img-top h-100" controls>
                    <source src="../../public/videos/Easy Carbonara Recipe Japanese Style.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
                <div class="card-footer text-center">
                    <a href="#" class="btn btn-primary">
                        <i class="bi bi-download"></i> Download
                    </a>
                </div>
            </div>
        </div>
    </div>

    <?php include '../../_layout/footer.php' ?>
</body>

</html>