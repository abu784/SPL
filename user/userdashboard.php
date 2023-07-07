<?php
session_start(); // Start the session

if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit;

}
$username = $_SESSION['username'];
require "../includes/dbconnect.php";
$select = "SELECT * FROM teams WHERE mobile = '$username'";
$result = $conn->query($select);
$row = $result->fetch_assoc();
$team_name = $row['team_name'];
$captain_name = $row['captain_name'];
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="../css/user.css">
    <title>SPL | DASHBOARD</title>
    <style>
        .welcome{
            text-transform:uppercase;
        }
    </style>
</head>

<body id="body-pd">
    <header class="header" id="header">
        <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
        
    </header>
    <div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div> <a href="userdashboard.php" class="nav_logo"> <i class='bx bx-layer nav_logo-icon'></i> <span class="nav_logo-name">SPL</span> </a>
                <div class="nav_list"> <a href="userdashboard.php" class="nav_link active"> <i class='bx bx-grid-alt nav_icon'></i> <span class="nav_name">Dashboard</span> </a>
                            <a href="teams.php?id=<?php echo $username?>" class="nav_link"> <i class='bx bx-message-square-detail nav_icon'></i> <span class="nav_name">TEAM</span> </a> 
                           
                 </div>
            </div> <a href="logout.php" class="nav_link"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">SignOut</span> </a>
        </nav>
    </div>
    <!--Container Main start-->
    <div class="height-100 bg-light">
   <h1>YOUR ALL DONE</h1>
   <h3>FOR FURTHER UPDATE CALL : 6383207901</h3>
   <!-- Add this code within the <body> tag, after the table -->
<a href="tel:1234567890" class="btn btn-primary">Call Us</a>

    </div>
    <!--Container Main end-->
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="../js/sidbar.js"></script>
</html>
