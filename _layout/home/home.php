<style>
    body {
        background-color: rgb(210, 201, 201);
    }

    /* Standardize image size */
    .sm-img {
        width: 100%;
        height: 200px;
        object-fit: cover;
        transition: transform 0.3s ease;
    }

    .lg-img {
        width: 100%;
        height: 458px;
        object-fit: cover;
        transition: transform 0.3s ease;
    }

    /* Hover effect for displaying description */
    .recipe-card {
        position: relative;
        overflow: hidden;
    }

    .recipe-card img:hover {
        transform: scale(1.1);
    }

    .recipe-card .description {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.715);
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .recipe-card .description p {
        color: rgb(248, 233, 210);
        font-style: oblique;
        font-family: Cambria, Cochin, Georgia, Times, "Times New Roman", serif;
        font-size: 1.5rem;
    }

    .recipe-card:hover .description {
        opacity: 1;
        /* Display description on hover */
    }

    /* Explore More button styling */
    .btn-explore-more {
        float: right;
        border: 1px solid black;
        color: rgb(1, 29, 19);
        transition: background-color 0.3s ease, transform 0.2s ease;
    }

    .btn-explore-more:hover {
        background-color: rgb(42, 21, 21);
        color: rgba(240, 229, 229, 0.81);
        transform: scale(1.05);
        cursor: pointer;
    }

    .carousel-item img {
        height: 500px;
        object-fit: cover;
        border-radius: 10px;
    }

    .carousel-caption {
        background: rgba(49, 5, 5, 0.267);
        border-radius: 8px;
        padding: 10px 15px;
    }

    /* .carousel-caption:hover {
        background-color: rgb(229, 221, 221);
        color: rgb(86, 6, 6);
        transform: scale(1.15);
        cursor: pointer;
    } */

    .carousel-caption h5 {
        font-size: 1.5rem;
        margin-bottom: 5px;
    }

    .carousel-caption p {
        font-size: 1rem;
        margin: 0;
    }

    .col-md-6 h2 {
        color: rgb(9, 5, 1);
        font-family: sans-serif;
        font-size: 2.5rem;
    }

    .col-md-6 p {
        font-family: Verdana, Geneva, Tahoma, sans-serif;
        color: rgb(9, 5, 1);
    }

    .col-md-6 a {
        color: rgb(9, 5, 1);
    }
</style>

<section class="container my-5">
    <div class="row align-items-center">
        <!-- Image on the Left -->
        <div class="col-md-6">
            <img
                src="images/main.png"
                alt="Delicious Food"
                class="img-fluid rounded" />
        </div>

        <!-- Mission and Meaning on the Right -->
        <div class="col-md-6">
            <h2 class="mb-3">Our Mission</h2>
            <p>
                At FoodFusion, our mission is to bring diverse culinary traditions
                together, creating a fusion of flavors that celebrate global
                cultures.
            </p>
            <h2 class="mt-4">What FoodFusion Means</h2>
            <p>
                FoodFusion is the art of blending ingredients, techniques, and
                traditions from various cuisines to create something unique and
                delicious.
            </p>

            <!-- Read More Button -->
            <a
                href="pages/about.php"
                class="btn btn-outline-primary mt-3">Read More...</a>
        </div>
    </div>
</section>
<!-- Section 2: Featured Recipes -->
<section class="container my-5">
    <h2 class="text-center mb-4">Featured Recipes</h2>
    <div class="row">
        <!-- Latest Trend Recipe (Left) -->
        <div class="col-md-6">
            <div class="recipe-card">
                <img
                    class="lg-img"
                    src="images/ft1.jpg"
                    alt="Fusion Sushi Rolls"
                    class="img-fluid rounded" />
                <div class="description">
                    <p>Fusion of traditional sushi with modern flavors.</p>
                </div>
            </div>
            <h5 class="text-center mt-2">Fusion Sushi Rolls</h5>
        </div>

        <!-- Trending Recipes (Right) -->
        <div class="col-md-6">
            <div class="row">
                <div class="col-6 mb-4">
                    <div class="recipe-card">
                        <img
                            class="sm-img"
                            src="images/ft2.jpg"
                            alt="Spicy Thai Basil Chicken"
                            class="img-fluid rounded" />
                        <div class="description">
                            <p>A spicy and savory dish infused with basil.</p>
                        </div>
                    </div>
                    <h6 class="text-center mt-2">Spicy Thai Basil Chicken</h6>
                </div>
                <div class="col-6 mb-4">
                    <div class="recipe-card">
                        <img
                            class="sm-img"
                            src="images/ft5.jpg"
                            alt="Mediterranean Hummus Platter"
                            class="img-fluid rounded" />
                        <div class="description">
                            <p>Rich, creamy hummus served with fresh veggies.</p>
                        </div>
                    </div>
                    <h6 class="text-center mt-2">Mediterranean Hummus Platter</h6>
                </div>
                <div class="col-6">
                    <div class="recipe-card">
                        <img class="sm-img" src="images/ft3.jpg"
                            class="img-fluid rounded">
                        <div class="description">
                            <p>Crunchy nachos loaded with cheese and toppings.</p>
                        </div>
                    </div>
                    <h6 class="text-center mt-2">Tex-Mex Loaded Nachos</h6>
                </div>
                <div class="col-6">
                    <div class="recipe-card">
                        <img
                            class="sm-img"
                            src="images/ft4.jpg"
                            alt="Italian Truffle Pasta"
                            class="img-fluid rounded" />
                        <div class="description">
                            <p>A decadent pasta dish with rich truffle flavor.</p>
                        </div>
                    </div>
                    <h6 class="text-center mt-2">Italian Truffle Pasta</h6>
                </div>
            </div>
        </div>
    </div>
    <a href="recipes_collection.html" class="btn btn-explore-more mt-3">Explore More</a>
</section>

<!-- Section 3: Culinary Trends -->
<section class="container my-5">
    <h2 class="text-center mb-4">Culinary Trends</h2>
    <div class="row">
        <!-- Latest Trend Food (Left) -->
        <div class="col-md-6">
            <div class="recipe-card">
                <img
                    class="lg-img"
                    src="images/ct5.jpg"
                    alt="Vegan Jackfruit Tacos"
                    class="img-fluid rounded" />
                <div class="description">
                    <p>Delicious plant-based tacos with pulled jackfruit.</p>
                </div>
            </div>
            <h5 class="text-center mt-2">Vegan Jackfruit Tacos</h5>
        </div>

        <!-- Trending Foods (Right) -->
        <div class="col-md-6">
            <div class="row">
                <div class="col-6 mb-4">
                    <div class="recipe-card">
                        <img
                            class="sm-img"
                            src="images/ct1.jpg"
                            alt="Korean Kimchi Pancakes"
                            class="img-fluid rounded" />
                        <div class="description">
                            <p>Spicy pancakes made with tangy kimchi.</p>
                        </div>
                    </div>
                    <h6 class="text-center mt-2">Korean Kimchi Pancakes</h6>
                </div>
                <div class="col-6 mb-4">
                    <div class="recipe-card">
                        <img
                            class="sm-img"
                            src="images/ct2.jpg"
                            alt="Japanese Matcha Cheesecake"
                            class="img-fluid rounded" />
                        <div class="description">
                            <p>Rich cheesecake infused with matcha flavors.</p>
                        </div>
                    </div>
                    <h6 class="text-center mt-2">Japanese Matcha Cheesecake</h6>
                </div>
                <div class="col-6">
                    <div class="recipe-card">
                        <img
                            class="sm-img"
                            src="images/ct3.jpg"
                            alt="Middle Eastern Shakshuka"
                            class="img-fluid rounded" />
                        <div class="description">
                            <p>Poached eggs in a spiced tomato sauce.</p>
                        </div>
                    </div>
                    <h6 class="text-center mt-2">Middle Eastern Shakshuka</h6>
                </div>
                <div class="col-6">
                    <div class="recipe-card">
                        <img
                            class="sm-img"
                            src="images/ct4.jpg"
                            alt="Indian Butter Chicken Pizza"
                            class="img-fluid rounded" />
                        <div class="description">
                            <p>A fusion of classic pizza with butter chicken.</p>
                        </div>
                    </div>
                    <h6 class="text-center mt-2">Indian Butter Chicken Pizza</h6>
                </div>
            </div>
        </div>
    </div>
    <a href="recipes_collection.html" class="btn btn-explore-more mt-3">Explore More</a>
</section>

<!-- Events Section -->
<section class="events-section py-5">
    <div class="container">
        <h2 class="text-center mb-4">Upcoming Events</h2>
        <div id="eventsCarousel" class="carousel slide" data-bs-ride="carousel">
            <!-- Indicators (Discs) -->
            <div class="carousel-indicators">
                <button
                    type="button"
                    data-bs-target="#eventsCarousel"
                    data-bs-slide-to="0"
                    class="active"
                    aria-current="true"
                    aria-label="Slide 1"></button>
                <button
                    type="button"
                    data-bs-target="#eventsCarousel"
                    data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button
                    type="button"
                    data-bs-target="#eventsCarousel"
                    data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
                <button
                    type="button"
                    data-bs-target="#eventsCarousel"
                    data-bs-slide-to="3"
                    aria-label="Slide 4"></button>
            </div>

            <!-- Carousel Inner -->
            <div class="carousel-inner">
                <!-- Slide 1 -->
                <div class="carousel-item active">
                    <div class="event-item">
                        <img src="images/ce4.png" class="d-block w-100" alt="Event 1" />
                        <div class="carousel-caption">
                            <h5>Fusion Fiesta</h5>
                            <p>
                                Experience a night of global flavors with our signature
                                fusion dishes and live music.
                            </p>
                        </div>
                    </div>
                </div>
                <!-- Slide 2 -->
                <div class="carousel-item">
                    <div class="event-item">
                        <img src="images/ce2.png" class="d-block w-100" alt="Event 2" />
                        <div class="carousel-caption">
                            <h5>Cooking Workshop</h5>
                            <p>
                                Learn the art of food fusion with our expert chefs in an
                                interactive cooking class.
                            </p>
                        </div>
                    </div>
                </div>
                <!-- Slide 3 -->
                <div class="carousel-item">
                    <div class="event-item">
                        <img src="images/ce3.jpg" class="d-block w-100" alt="Event 3" />
                        <div class="carousel-caption">
                            <h5>Fusion Sushi Rolls</h5>
                            <p>
                                Enjoy a specially curated brunch menu featuring fusion
                                delights from across the globe.
                            </p>
                        </div>
                    </div>
                </div>
                <!-- Slide 4 -->
                <div class="carousel-item">
                    <div class="event-item">
                        <img src="images/ce1.png" class="d-block w-100" alt="Event 4" />
                        <div class="carousel-caption">
                            <h5>Fusion Cook-Off</h5>
                            <p>
                                Join us for a memorable evening of food and philanthropy at
                                our charity fusion dinner.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Controls -->
            <button
                class="carousel-control-prev"
                type="button"
                data-bs-target="#eventsCarousel"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button
                class="carousel-control-next"
                type="button"
                data-bs-target="#eventsCarousel"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
</section>