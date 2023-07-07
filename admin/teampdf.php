<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
require "../includes/dbconnect.php";
 if (isset($_GET['id'])){
    $id = $_GET['id'];
    $select= "SELECT * FROM teams WHERE id = '$id'";
    $res_team  = $conn->query($select);
    $row = $res_team->fetch_assoc();
    $team_name = $row['team_name'];
    $captain_name = $row['captain_name'];
    $captain_mobile = $row['mobile'];
    $team_id = $row['id'];
    $select_players = "SELECT * FROM players WHERE id = '$team_id'";
    $res_player = $conn->query($select_players);
 }
?>
<div class="pdf">
    <div class="top">
        <div class="top-left">
            <h2>TEAME NAME : <?php echo $team_name?></h2>
            <h2>CAPTAIN NAME : <?php echo $captain_name?></h2>
            <h2>CAPTAIN MOBILE : <?php echo $captain_mobile?></h2>
        </div>
        <div class="top-right">
            
        </div>
    </div>
</div>
</body>
</html>


