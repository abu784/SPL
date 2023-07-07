<?php
require "../includes/dbconnect.php";
if (isset($_POST['submit'])) {
    $currentPassword = $_POST['currentpass'];
    $newPassword = $_POST['newPassword'];
    $confirmPassword = $_POST['confirmPassword'];

    $select = "SELECT * FROM teams WHERE mobile = '$currentPassword'";
    $result = $conn->query($select);
    $row = $result->fetch_assoc();
    $pass = $row['password'];
    $mobile = $row['mobile'];
    if ($newPassword == $pass) {
        echo "<script>alert('Need to change password. Please don't use the old password.');
        window.location = 'password.php';</script>";
    } else {
        if ($confirmPassword == $newPassword) {
            $changePass = "UPDATE teams SET password = '$newPassword' WHERE mobile = '$currentPassword'";
            if ($conn->query($changePass)) {
                $_SESSION['username'] = $mobile; // Store username in session
                header("Location: welcome.php");
            } else {
                echo "<script>alert('Failed to change the password.');
                window.location = 'password.php';</script>";
            }
        } else {
            echo "<script>alert('Passwords do not match.');
                window.location = 'password.php';</script>";
        }
    }
}
?>
