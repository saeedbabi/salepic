<?php

namespace App\Services\Uploader;


class FileUploader
{
    private $file;
    private $validator;
    public function __construct(FileValidator $validator, Files $file)
    {
        $this->file = $file;
        $this->validator = $validator;
    }




    private function validate()
    {
        $this->validator->setFile($this->file)
            ->isAllowedExtension()
            ->isExceededMaximumFileSize();
    }

    public function upload($sub_folder = null)
    {
        $this->validate();
        $path = STORAGE_PATH . $this->file->path_in_storage;
        move_uploaded_file($this->file->tempName(), $path);
        return storage_url($this->file->path_in_storage);
    }

    public function destroy()
    {
        $path = STORAGE_PATH . str_replace("/", DIRECTORY_SEPARATOR, $this->file->path_in_storage);
        if (!file_exists($path)) {
            return;
        }
        return unlink($path);
        // return rename($path, $path . ".deleted");
    }
}
