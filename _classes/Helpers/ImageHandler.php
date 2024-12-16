<?php

namespace Bb\Blendingbites\Helpers;

class ImageHandler
{
    static function upload(array $file): string
    {
        $image = $file['image']['name'];
        $writePath = '../../images/uploads/' . basename($image);
        $readPath = 'images/uploads/' . basename($image);
        move_uploaded_file($file['image']['tmp_name'], $writePath);
        return $readPath;
    }
}
