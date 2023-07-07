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
$id = $row['id'];
$team_name = $row['team_name'];
$captain_name = $row['captain_name'];
$check = "SELECT * FROM players WHERE team_id = '$id'";
$res_check = $conn->query($check);
if ($res_check->num_rows > 0){
    header ('location:welcome2.php');
}
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
                            <a href="addplayers.php" class="nav_link "> <i class='bx bx-user nav_icon'></i> <span class="nav_name">ADD PLAYES</span> </a> 
                            <a href="" class="nav_link"> <i class='bx bx-message-square-detail nav_icon'></i> <span class="nav_name">TEAMS</span> </a> 
                            <a href="#" class="nav_link"> <i class='bx bx-bookmark nav_icon'></i> <span class="nav_name">MACHES</span> </a>
                 </div>
            </div> <a href="logout.php" class="nav_link"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">SignOut</span> </a>
        </nav>
    </div>
    <!--Container Main start-->
    <div class="height-100 bg-light">
        <div class="container">
    <h2 class="welcome ">WELCOME CAPTAIN  <br>
  <span class= "welcome text-danger"><?php echo $captain_name; ?></span></h2>
   <h1>AND YOUR TEAM <span class="text-danger"><?php echo $team_name;?></span> </h1> 
           <h3>NEED TO ENTER YOUR TEAM FIRST</h3>
           <a class="btn btn-success" href="addplayers.php">ENTER PLAYERS</a>
        </div>
    </div>
    <!--Container Main end-->
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="../js/sidbar.js"></script>
</html>
