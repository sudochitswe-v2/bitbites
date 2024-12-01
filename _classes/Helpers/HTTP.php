<?php

namespace Bb\Blendingbites\Helpers;

class HTTP
{
    public static function redirect($path, $query = "")
    {

        $url = $_ENV["BASE_PATH"] . $path;

        if ($query) $url .= "?$query";

        header("Location: $path");
        exit;
    }
}
