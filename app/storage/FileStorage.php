<?php

namespace App\Storage;

class FileStorage
{

    private $file;

    private $fileName;
    private $fileTmpName;
    private $fileExtension;

    private $baseStoragePath;
    private $savePath;

    private $accessPath;

    public function __construct($file, $entity, $id)
    {
        $this->file = $file;
        $this->fileName = $file['name'];
        $this->fileTmpName = $file['tmp_name'];
        $this->baseStoragePath = app()->basePath() . "/public/uploads/";

        $this->fileExtension = $this->getExtension($file["type"]);

        $name = $entity . "_" . $id . ".png";

        $this->savePath = $this->baseStoragePath . $name;
        $this->accessPath = "uploads/" . $name;
    }

    public function save()
    {
        move_uploaded_file($this->fileTmpName, $this->savePath);
        return $this->accessPath;
    }

    private function getExtension($type)
    {
        switch ($type) {
            case "image/png":
                return ".png";
            case "image/jpg":
            case "image/jpeg":
                return ".jpg";
            default:
                return ".jpg";
        }
    }
}
