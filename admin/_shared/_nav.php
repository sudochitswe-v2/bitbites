<?php
function navigationBuilder($routes)
{

    echo '<div class="vh-100 p-3" style="width: 250px; background-color: #F1F1F1">';
    echo '<h4 class="text-center mb-4">Admin Panel</h4>';
    echo '<nav class="nav flex-column">';
    foreach ($routes as $route) {
        echo '<a href="' . $route['url'] . '" class="nav-link fw-semibold">';
        if (isset($route['icon']) && $route['icon'] !== null) {
            echo '<i class="' . $route['icon'] . '"></i>';
        }
        echo $route['name'];
        echo '</a>';
    }
    echo '</nav>';
    echo '</div>';
}
