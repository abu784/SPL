<?php
session_start();
require "../includes/dbconnect.php";
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $select = "SELECT * FROM teams WHERE mobile = '$username'";
    $result = $conn->query($select);
    $row = $result->fetch_assoc();
    $status = $row['status'];
    $mobile = $row['mobile'];
    $pass = $row['password'];

    
        if ($status == 'paid') {
            if ($password == $pass && $username == $mobile) {
                if ($mobile == $pass){
                header("Location: password.php?mobile=$mobile");
                exit;
                }else{
                    $_SESSION['username'] = $username; // Store username in session
                header("Location: welcome.php?mobile=$mobile");
                exit;
                }
            } else {
                echo "<script>alert('Wrong username or password');
                window.location = 'login.php';</script>";
            }
        } else {
            echo "<script>alert('Account not activated');
            window.location = 'login.php';</script>";
        }
    } else {
        header('Location: userdashboard.php');
        exit;
    }

?>
