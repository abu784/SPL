<?php
require "../includes/dbconnect.php";
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $paid = "UPDATE teams SET status = 'cancelled' WHERE id = '$id'";
    if ($conn->query($paid)){
        echo "<script>alert('team cancelled successfully');
        window.location ='registrations.php'</script>";
    } else{
        echo "<script>alert('canot update status');
        window.location ='registrations.php'</script>";
    }
}
?>