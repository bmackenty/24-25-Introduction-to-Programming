<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>File Upload</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <header>
            <h1>Header</h1>
        </header>

        <?php include 'navbar.php'; ?>

        <main>
            <h2>Upload a File</h2>
            <p>Please select a file to upload.</p>
            
            <form action="upload_process.php" method="POST" enctype="multipart/form-data">
                <label for="fileUpload">Choose a file:</label>
                <input type="file" name="uploadedFile" id="fileUpload" required>
                <br>
                <button type="submit">Upload</button>
            </form>
        </main>

        <?php include('footer.php'); ?>
    </body>
</html>
