<?php
require "../includes/dbconnect.php";
if (isset($_GET['id'])){
    $id = $_GET['id'];
    $delete = "DELETE FROM teams WHERE id = '$id'";
    if ($conn->query($delete)){
        echo "<script>alert('User deleted successfully.');
        window.location = 'registrations.php'</script>";
    } else {
        echo "<script>alert('Cannot delete the user.');
        window.location = 'registrations.php'</script>";
    }
}
?>
