<?php

namespace App\Services\Uploader;

use App\Enums\FileEnum;
use App\Utilities\FlashMessage;

class FileValidator
{
    private $file;
    private $maximumFileSize = FileEnum::maximumFileSize;
    private $allowedExtension = FileEnum::allowedExtension;

    public function setFile(Files $file)
    {
        $this->file = $file;
        return $this;
    }
    public function isAllowedExtension()
    {
        if (!in_array($this->file->mimeType(), $this->allowedExtension)) {
            FlashMessage::add("فرمت فایل معتبرنیست!", FlashMessage::ERROR);
        }
        return $this;
    }

    public function isExceededMaximumFileSize()
    {
        if ($this->file->size() > $this->maximumFileSize) {
            FlashMessage::add("اندازه فایل بیشتر از حد مجازاست!", FlashMessage::ERROR);
        }
        return $this;
    }
}
