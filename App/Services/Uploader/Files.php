<?php

namespace App\Services\Uploader;

class Files
{
    private $file;
    public $path_in_storage;
    const default_subfolder_format = "Ym";

    public function __construct($file, $sub_folder = null)
    {
        $this->file = $_FILES[$file];
        if ($sub_folder == null) {
            $sub_folder =  date(self::default_subfolder_format);
            $sub_folder_path = STORAGE_PATH . $sub_folder;
            if (!file_exists($sub_folder_path)) {
                mkdir($sub_folder_path);
            }
        }

        $this->path_in_storage =  $sub_folder . "/" . $this->basename() . '-' .
            $this->generateRandomStr() . "." . $this->extension();
    }

    public function mimeType()
    {
        return $this->file['type'];
    }

    public function size()
    {
        return $this->file['size'];
    }

    public function tempName()
    {
        return $this->file['tmp_name'];
    }

    public function name()
    {
        return substr($this->file['name'], 0, 32);
    }
    public function getFileParts()
    {
        $arr = explode('.', $this->name());
        return $arr;
    }

    public function extension()
    {
        $arr = explode('.', $this->name());
        return end($arr);
    }

    public function basename()
    {
        return basename($this->name(), $this->extension());
    }

    private function generateRandomStr()
    {
        return bin2hex(random_bytes(2));
    }
}
