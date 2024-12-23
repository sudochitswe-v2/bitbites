<?php

namespace Bb\Blendingbites\Helpers;

use RuntimeException;

class ImageHandler
{
    public static function upload(array $file): string
    {
        $dir = str_replace("_classes\Helpers", "", __DIR__);

        $writeDir = $dir . 'images/uploads/';
        if (!is_dir($writeDir)) {
            mkdir($writeDir, 0755, true);
        }

        $image = $file['image']['name'];
        $writePath = $writeDir . basename($image);
        $readPath = 'images/uploads/' . basename($image);

        // Move uploaded file
        if (move_uploaded_file($file['image']['tmp_name'], $writePath)) {
            return $readPath;
        }
        throw new RuntimeException('Failed to upload the file.');
    }
}
