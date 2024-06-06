<?php
// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["file"])) {
    $file = $_FILES["file"];

    // Check for errors during file upload
    if ($file["error"] === UPLOAD_ERR_OK) {
        $filename = basename($file["name"]);
        $destination = "cmds/" . $filename;

        // Move the uploaded file to the destination directory
        if (move_uploaded_file($file["tmp_name"], $destination)) {
            echo "File uploaded successfully.";
        } else {
            echo "Error uploading file.";
        }
    } else {
        echo "Error: " . $file["error"];
    }
} else {
    // Display the HTML form for file upload
    echo '
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>File Upload</title>
    </head>
    <body>
        <h2>Upload New CMDS</h2>
        <form action="' . $_SERVER["PHP_SELF"] . '" method="post" enctype="multipart/form-data">
            <input type="file" name="file">
            <button type="submit" name="submit">Upload</button>
        </form>
    </body>
    </html>';
}
?>