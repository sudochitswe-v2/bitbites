<?php

namespace Bb\Blendingbites\Helpers;

class HTTP
{
    public static function redirect($path, $query = [])
    {
        $url = $_ENV["BASE_PATH"] . $path;

        if (!empty($query) && is_array($query)) {
            $url .= '?' . http_build_query($query);
        }
        header("Location: $url");
        exit;
    }
}
