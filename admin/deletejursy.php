<?php
require "../includes/dbconnect.php";
if (isset($_GET['id'])){
    $id = $_GET['id'];
    $delete = "DELETE FROM images WHERE id = '$id'";
    if ($conn->query($delete)){
        echo "<script>alert('jersey deleted successfully.');
        window.location = 'jursy.php'</script>";
    } else {
        echo "<script>alert('Cannot delete the jursey.');
        window.location = 'jursy.php'</script>";
    }
}
?>