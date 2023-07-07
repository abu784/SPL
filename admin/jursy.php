

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="../css/admin.css">
    <title>SPL | DASHBOARD</title>
</head>

<body id="body-pd">
    <header class="header" id="header">
        <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
        
    </header>
    <div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div> <a href="#" class="nav_logo"> <i class='bx bx-layer nav_logo-icon'></i> <span class="nav_logo-name">SMART REACH</span> </a>
                <div class="nav_list"> <a href="#" class="nav_link"> <i class='bx bx-grid-alt nav_icon'></i> <span class="nav_name">Dashboard</span> </a>
                            <a href="registrations.php" class="nav_link"> <i class='bx bx-user nav_icon'></i> <span class="nav_name">REGISTRATION</span> </a> 
                            <a href="teams.php" class="nav_link"> <i class='bx bx-message-square-detail nav_icon'></i> <span class="nav_name">TEAMS</span> </a> 
                            <a href="jursy.php" class="nav_link active"> <i class='bx bx-bookmark nav_icon'></i> <span class="nav_name">MACHES</span> </a>
                 </div>
            </div> <a href="jursy.php" class="nav_link"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">SignOut</span> </a>
        </nav>
    </div>

    <h1>Bulk Image Upload</h1>
    <form action=addjersey.php method="post" enctype="multipart/form-data">
        <input type="file" name="images[]" multiple required><br><br>
        <input type="submit" value="Upload">
    </form>
<hr>
<?php
require "../includes/dbconnect.php";
$retrieveQuery = "SELECT filename, image , id , status FROM images";
$result = $conn->query($retrieveQuery);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Image Gallery</title>
    <style>
        .gallery {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            grid-gap: 10px;
        }

        .gallery-item {
            text-align: center;
        }

        .gallery-item img {
            max-width: 100%;
            height: auto;
        }
    </style>
</head>
<body>
<h1>Image Gallery</h1>
<div class="gallery">
    <?php
    // Display the images and names
    while ($row = $result->fetch_assoc()) {
    $id = $row['id'];
        $filename = $row['filename'];
        $imageData = $row['image'];
        $status = $row['status'];
        $base64Image = base64_encode($imageData);

        echo '<div class="gallery-item">';
        echo '<img src="data:image/jpeg;base64,' . $base64Image . '" alt="' . $filename . '">';
        echo '<p><strong>' . $status .'</strong></p>';
        echo '<a class="btn btn-primary" href="editjursy.php?filename=' . urlencode($filename) . '">Edit</a>';
        echo '<a class="btn btn-danger" href="deletejursy.php?id=' . $id . '">Delete</a>';
        echo '</div>';
    }
    ?>
</div>


</body>
</html>

<?php
// Close the database connection
$conn->close();
?>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="../js/sidbar.js"></script>
</html>
