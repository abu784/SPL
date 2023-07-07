<?php
require "../includes/dbconnect.php";
?>

<?php $teamId = $_GET['username'];?>
<!DOCTYPE html>
<html>
<head>
    <title>Selectable Images</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .image-container {
            cursor: pointer;
        }

        .image-container.selected {
            border-color: blue;
        }

        .image-container img {
            max-width: 200px;
            height: auto;
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <h1>Select jersey Images</h1>
    <div class="row">
        <?php
        require "../includes/dbconnect.php";
        $teamId = $_GET['username'];
        $select = "SELECT * FROM images WHERE status = 'active'";
        $result = $conn->query($select);
        // Display the images
        while ($row = $result->fetch_assoc()) {
            $id = $row['id'];
            $filename = $row['filename'];
            $imageData = $row['image'];
            $base64Image = base64_encode($imageData);
            echo '<div class="col-md-3 mb-4">';
            echo '<div class="image-container border p-2" data-toggle="modal" data-target="#imageModal" data-id="' . $id . '">';
            echo '<label>';
            echo '<input type="radio" name="selected_image" value="' . $id . '" class="mr-2">';
            echo '<img src="data:image/jpeg;base64,' . $base64Image . '" alt="' . $filename . '" class="img-fluid">';
            echo '</label>';
            echo '</div>';
            echo '</div>';
        }
        ?>
    </div>
</div>

<!-- Image Modal -->
<div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="imageModalLabel">Selected Image</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <img id="selectedImage" src="" alt="Selected Image" class="img-fluid">
            </div>
            <div class="modal-footer">
                <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <input type="hidden" name="selected_image" id="selectedImageId">
                   <input type="hidden" name="team_id" value = "<?php echo $teamId ?>">
                   <input type="radio">
                   
                    <input type="submit" name="submit" class="btn btn-primary" value="Submit">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    // Handle image container click event
    $(document).ready(function() {
        $(".image-container").click(function() {
            var selectedImageId = $(this).data("id");
            var selectedImage = document.getElementById("selectedImage");
            var selectedImageIdField = document.getElementById("selectedImageId");

            $.ajax({
                type: "POST",
                url: "fetch_image.php",
                data: { imageId: selectedImageId },
                success: function(response) {
                    selectedImage.src = "data:image/jpeg;base64," + response;
                    selectedImageIdField.value = selectedImageId;
                    $('#imageModal').modal('show');
                }
            });
        });
    });
</script>
<?php
if (isset($_POST['submit'])) {
    require "../includes/dbconnect.php";

    $selectedImageId = $_POST['selected_image'];
    $status = "selected";
$teamId = $_POST['team_id'];
    // Update the line below to assign the correct value to $teamId


    // Prepare and execute the first update query
    $updateTeams = "UPDATE teams SET jursy = ? WHERE mobile = ?";
    $stmtTeams = $conn->prepare($updateTeams);
    $stmtTeams->bind_param("ss", $selectedImageId, $teamId);

    // Prepare and execute the second update query
    $updateImages = "UPDATE images SET status = ? WHERE id = ?";
    $stmtImages = $conn->prepare($updateImages);
    $stmtImages->bind_param("ss", $status, $selectedImageId);

    // Execute both update queries within a transaction
    $conn->begin_transaction();

    try {
        $stmtTeams->execute();
        $stmtImages->execute();

        $conn->commit();
        $stmtTeams->close();
        $stmtImages->close();

        echo "<script>alert('Done $teamId');
        window.location = 'userdashboard.php'</script>";
    } catch (Exception $e) {
        $conn->rollback();
        echo "Error: " . $e->getMessage();
    }

    $conn->close();
}
?>

</body>
</html>
