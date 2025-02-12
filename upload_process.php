<?php

// Check if a file was uploaded
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['uploadedFile'])) {
    
    // Define allowed file types and size limit (e.g., 5MB)
    $allowedTypes = ['image/jpeg', 'image/png', 'application/pdf'];
    $maxFileSize = 5 * 1024 * 1024; // 5MB
    
    // Extract file information
    $file = $_FILES['uploadedFile'];
    $fileName = basename($file['name']);
    $fileType = $file['type'];
    $fileSize = $file['size'];
    $fileTmpName = $file['tmp_name'];
    $fileError = $file['error'];
    
    // Define upload directory
    $uploadDir = 'uploads/';
    
    // Ensure the uploads directory exists
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0755, true);
    }
    
    // Construct file destination path
    $uploadPath = $uploadDir . $fileName;
    
    // Error checking
    if ($fileError !== UPLOAD_ERR_OK) {
        die("Error uploading file: " . $fileError);
    }
    
    // Validate file type
    if (!in_array($fileType, $allowedTypes)) {
        die("Invalid file type. Only JPEG, PNG, and PDF files are allowed.");
    }
    
    // Validate file size
    if ($fileSize > $maxFileSize) {
        die("File size exceeds the 5MB limit.");
    }
    
    // Check if file already exists to prevent overwriting
    if (file_exists($uploadPath)) {
        die("File already exists. Please rename your file and try again.");
    }
    
    // Attempt to move uploaded file to the destination directory
    if (move_uploaded_file($fileTmpName, $uploadPath)) {
        echo "File successfully uploaded: <a href='$uploadPath'>$fileName</a>";
    } else {
        die("Error moving the uploaded file.");
    }
} else {
    die("No file was uploaded.");
}
?>
