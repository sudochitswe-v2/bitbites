<!DOCTYPE html>
<html lang="en">

<header>
    <?php
    include '../../env_loader.php';

    use Bb\Blendingbites\Helpers\HTTP;
    use Bb\Blendingbites\Libs\Database\MySQL;
    use Bb\Blendingbites\Libs\Database\RecipesTable;

    $recipesTable = new RecipesTable(new MySQL());
    $recipes = $recipesTable->getAll();
    include '../../_layout/nav_bar.php';
    ?>
</header>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recipe_Collection</title>
    <link rel="stylesheet" href="../../public/css/style.css">
    <link rel="shortcut icon" href="../../public/images/favico.png" type="image/png">
    <link rel="stylesheet" href="../../public/css/bootstrap/5.1.3/bootstrap.min.css">
    <link rel="stylesheet" href="../../public/css/font-awesome/5.10.0/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="../../public/js/bootstrap/5.1.3/bootstrap.min.js"></script>
    <script src="../../public/js/bootstrap/5.1.3/bootstrap.bundle.min.js"></script>

</head>
<style>
    body {
        background-color: rgb(210, 201, 201);
    }

    .input-group .form-control:hover,
    .input-group .form-control:focus {
        box-shadow: none;
        border-color: rgb(0, 0, 0);
    }

    .input-group .btn:hover,
    .input-group .btn:focus {
        box-shadow: none;
        background-color: transparent;
        border-color: rgb(0, 0, 0);
        color: inherit;
        cursor: pointer;
    }

    .card-img-top {
        width: 100%;
        height: 300px;
        object-fit: cover;
    }
</style>

<body>
    <!-- Welcome Section -->
    <section class="welcome-section position-relative text-center">
        <div class="welcome-content">
            <h1>Welcome to Our Recipe Collection</h1>
            <p class="lead">Discover diverse flavors from around the world and create unforgettable meals. Let’s explore!</p>
        </div>
    </section>

    <!-- Search Section -->
    <section class="py-5">
        <div class="container text-center">
            <h2 class="mb-4">Find Your Favorite Recipes</h2>
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <form id="search" method="POST" action="hidden">

                        <div class="input-group">
                            <button class="btn btn-outline-secondary" type="submit" id="search-button">
                                <i class="fa fa-search"></i>
                            </button>
                            <input type="text" name="name" class="form-control" placeholder="Search for recipes..." aria-label="Search">


                        </div>
                    </form>
                </div>
                <div class="col-md-auto">
                    <div class="dropdown">
                        <button class="btn btn-outline-dark dropdown-toggle" type="button" id="spicyDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            Cuisine
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="spicyDropdown">
                            <li><a class="dropdown-item" href="#">Asian</a></li>
                            <li><a class="dropdown-item" href="#">Western</a></li>
                            <li><a class="dropdown-item" href="#">European</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-auto">
                    <div class="dropdown">
                        <button class="btn btn-outline-dark dropdown-toggle" type="button" id="drinksDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            Difficulities Level
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="drinksDropdown">
                            <li><a class="dropdown-item" href="#">Easy</a></li>
                            <li><a class="dropdown-item" href="#">Medium</a></li>
                            <li><a class="dropdown-item" href="#">Hard</a></li>
                            <li><a class="dropdown-item" href="#">Challenging</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Recipe List Section -->
    <section class="py-5">
        <div class="container">
            <h2 class="text-center mb-4">Our Recipes</h2>
            <div id="recipesGrid" class="row gy-4">
                <?php foreach ($recipes as $recipe): ?>
                    <div class="col-md-6">
                        <div class="card h-100">
                            <a href="<?= HTTP::url('/pages/recipes/detail.php') ?>?id=<?= $recipe['id'] ?>">
                                <img src="<?= $_ENV['BASE_PATH'] . '/' . htmlspecialchars($recipe['image']) ?>" class="card-img-top" alt="Recipe Photo">
                            </a>
                            <div class="card-body d-flex flex-column justify-content-between">
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="fw-bold"><?= htmlspecialchars($recipe['name']) ?></span>
                                    <div class="d-flex align-items-center">
                                        <i class="far fa-heart text-danger me-1 heart-icon" onclick="increaseLikes(this)"></i>
                                        <span class="like-count"><?= htmlspecialchars(count($recipe['liked_user_ids'])) ?></span>
                                    </div>
                                    <span class="text-muted"><?= htmlspecialchars($recipe['difficulty']['name']) ?></span>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <?php
                                    for ($i = 1; $i <= $recipe['difficulty']['value']; $i++) {
                                        echo '<i class="col-xs fa fa-star text-warning"></i>';
                                    }
                                    ?>
                                </div>
                                <p class="text-muted mb-0"><?= htmlspecialchars($recipe['cuisine']['name']) ?></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
    </section>
    <?php include '../../_layout/footer.php' ?>
</body>
<script>
    function increaseLikes(heart) {
        let likeCount = heart.nextElementSibling;
        let count = parseInt(likeCount.innerText);
        count += 1;
        likeCount.innerText = count;

        heart.classList.remove('bi-heart');
        heart.classList.add('bi-heart-fill');
    }
    $(document).ready(function() {
        $('#search').on('submit', function(e) {
            e.preventDefault();
            $.ajax({
                url: '_search.php',
                type: 'POST',
                data: $(this).serialize(),
                success: function(response) {
                    $('#recipesGrid').html(response);
                }
            })
        })
    })
</script>

</html>