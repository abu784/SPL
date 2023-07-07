<?php
require "../includes/dbconnect.php";

if (isset($_POST['imageId'])) {
    $imageId = $_POST['imageId'];

    $getImage = "SELECT image FROM images WHERE id = ?";
    $stmt = $conn->prepare($getImage);
    $stmt->bind_param("s", $imageId);
    $stmt->execute();
    $stmt->bind_result($imageData);
    $stmt->fetch();
    $stmt->close();

    $base64Image = base64_encode($imageData);
    echo $base64Image;
}
?>
