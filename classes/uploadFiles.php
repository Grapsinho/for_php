<?php

namespace classes;

class uploadFiles {
    private $targetDir;
    private $allowedFormats;
    private $maxFileSize;
    
    public function __construct($targetDir = 'uploads/', $allowedFormats = ["jpg", "jpeg", "png", "gif", "pdf"], $maxFileSize = 5000000) {
        $this->targetDir = $targetDir;
        $this->allowedFormats = $allowedFormats;
        $this->maxFileSize = $maxFileSize;
    }
    
    public function uploadFile($file) {
        $targetFile = $this->targetDir . basename($file["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
    
        // Check if file already exists
        if (file_exists($targetFile)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }
    
            // Check file size
        if ($file["size"] > $this->maxFileSize) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }
    
            // Allow certain file formats
        if (!in_array($imageFileType, $this->allowedFormats)) {
            echo "Sorry, only JPG, JPEG, PNG, GIF, and PDF files are allowed.";
            $uploadOk = 0;
        }
    
            // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        } else {
            // If everything is OK, try to upload file
            if (move_uploaded_file($file["tmp_name"], $targetFile)) {
                echo "The file " . htmlspecialchars(basename($file["name"])) . " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }


    }
}