<?php

namespace App\Enums;

class FileEnum
{
    const STATUS_DRAFT = 0;
    const STATUS_PUBLISHED = 1;
    const STATUS_SUSPENDED = 2;
    const STATUS_DELETED = 3;


    const gender_type = array(0 => "مرد", 1 => "زن");
    const allowedExtension = array('image/jpg', 'image/png', 'image/jpeg');
    const maximumFileSize = 5000000;
}
