<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Database configuration
 require "../includes/dbconnect.php";
    // Get the total number of images uploaded
    $totalImages = count($_FILES['images']['name']);

    // Iterate through each uploaded image
    for ($i = 0; $i < $totalImages; $i++) {
        $tmpFilePath = $_FILES['images']['tmp_name'][$i];
        $fileName = $_FILES['images']['name'][$i];

        // Read the contents of the temporary file
        $imageData = file_get_contents($tmpFilePath);

        // Generate a unique filename to avoid conflicts
        $uniqueFileName = uniqid() . '_' . $fileName;

        // Prepare the insert statement
        $insertQuery = "INSERT INTO images (image, filename) VALUES (?, ?)";
        $stmt = $conn->prepare($insertQuery);
        $stmt->bind_param("ss", $imageData, $uniqueFileName);

        // Execute the insert statement
        if ($stmt->execute()) {
            echo "File $fileName uploaded successfully.<br>";
            header("Location:jursy.php");
        } else {
            echo "Error uploading $fileName.<br>";
        }

        // Close the prepared statement
        $stmt->close();
    }

    // Close the database connection
    $conn->close();
}
?>
