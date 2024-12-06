<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Upload Example</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include 'navbar.php'; ?>

    <main>
        <h2>Upload an Image</h2>

        <!-- Display the form for file upload -->
        <form action="upload.php" method="POST" enctype="multipart/form-data">
            <!-- Input field for selecting the file -->
            <label for="file">Select an image to upload:</label><br>
            <input type="file" name="file" id="file" accept="image/*" required><br><br>
            <!-- Submit button -->
            <button type="submit" name="upload">Upload</button>
        </form>

        <?php
        // Check if the form is submitted
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['upload'])) {

            // Directory to store uploaded files (ensure this directory exists and is writable)
            $uploadDir = 'uploads/';

            // Check if the uploads directory exists
            if (!is_dir($uploadDir)) {
                // Attempt to create the directory if it doesn't exist
                mkdir($uploadDir, 0755, true);
            }

            // Get the file from the form
            $file = $_FILES['file'];

            // Extract details about the file
            $fileName = basename($file['name']); // Get the file name
            $fileTmpName = $file['tmp_name'];   // Get the temporary file path
            $fileSize = $file['size'];          // Get the file size
            $fileError = $file['error'];        // Check for errors
            $fileType = $file['type'];          // Get the MIME type of the file

            // Define allowed file types (images only)
            $allowedTypes = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif'];

            // Check if the file is an allowed type
            if (in_array($fileType, $allowedTypes)) {
                // Define the target file path
                $targetFile = $uploadDir . $fileName;

                // Check if there are no errors with the file
                if ($fileError === 0) {
                    // Limit the file size (e.g., 2 MB)
                    $maxFileSize = 2 * 1024 * 1024; // 2 MB in bytes
                    if ($fileSize <= $maxFileSize) {
                        // Attempt to move the file to the uploads directory
                        if (move_uploaded_file($fileTmpName, $targetFile)) {
                            echo "<p style='color: green;'>File uploaded successfully: <a href='$targetFile'>$fileName</a></p>";
                        } else {
                            echo "<p style='color: red;'>Error: Could not save the file. Please check directory permissions.</p>";
                        }
                    } else {
                        echo "<p style='color: red;'>Error: File size exceeds 2 MB limit.</p>";
                    }
                } else {
                    echo "<p style='color: red;'>Error: There was a problem with the upload (Error Code: $fileError).</p>";
                }
            } else {
                echo "<p style='color: red;'>Error: Invalid file type. Only JPEG, PNG, and GIF are allowed.</p>";
            }
        }
        ?>
    </main>

  <?php include ('footer.php'); ?>
</body>
</html>
