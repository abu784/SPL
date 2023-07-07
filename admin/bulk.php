<?php
// Read the contents of the temporary file
$imageData = file_get_contents($tmpFilePath);

// Prepare the insert statement
$insertQuery = "INSERT INTO images (image, filename) VALUES (?, ?)";
$stmt = $dbConn->prepare($insertQuery);
$stmt->bind_param("ss", $imageData, $uniqueFileName);

// Execute the insert statement
if ($stmt->execute()) {
    echo "File $fileName uploaded successfully.<br>";
} else {
    echo "Error uploading $fileName.<br>";
}

// Close the prepared statement
$stmt->close();

?>