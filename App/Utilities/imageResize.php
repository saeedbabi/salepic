<?php

namespace App\Utilities;

class imageResize
{

    public static function resize($filename)
    {
        //Get newsizes
        list($width, $heigth) = getimagesize($filename);
        $new_width = 50;
        $new_heigth = 40;

        // Load
        $thumb = imagecreatetruecolor($new_width, $new_heigth);
        $source = imagecreatefromjpeg($filename);

        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $new_width, $new_heigth, $width, $heigth);

        // Contet type
        header('Contet-Type:image/jpg');

        // save to file
        $newFileName = str_replace(".jpg", "(resize).jpg", $filename);
        imagejpeg($thumb, $newFileName);


        // Free memory
        //imagedestroy($thumb);
        //  imagedestroy($filename);
    }
}
