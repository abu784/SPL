<?php
// Database configuration
require "../includes/dbconnect.php";

// Check if the filename parameter is provided
if (isset($_GET['filename'])) {
    $filename = $_GET['filename'];

    // Retrieve the image data from the database
    $retrieveQuery = "SELECT image FROM images WHERE filename = ?";
    $stmt = $conn->prepare($retrieveQuery);
    $stmt->bind_param("s", $filename);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        // Display the edit form
        echo '<h1>Edit Image: ' . $filename . '</h1>';
        echo '<form method="post" enctype="multipart/form-data">';
        echo '<input type="file" name="new_image" required><br><br>';
        echo '<input type="submit" value="Update">';
        echo '</form>';
    } else {
        echo 'Image not found.';
    }

    $stmt->close();
} else {
    echo 'Invalid request.';
}

// Handle the image update
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['new_image']) && $_FILES['new_image']['error'] === 0) {
    // Retrieve the new image data
    $newImageData = file_get_contents($_FILES['new_image']['tmp_name']);

    // Update the image in the database
    $updateQuery = "UPDATE images SET image = ? WHERE filename = ?";
    $stmt = $conn->prepare($updateQuery);
    $stmt->bind_param("ss", $newImageData, $filename);

    if ($stmt->execute()) {
        echo 'Image updated successfully.';
    } else {
        echo 'Error updating the image.';
    }

    $stmt->close();
}

// Close the database connection
$conn->close();
?>
