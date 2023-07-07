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
    $captain_mobile = $row['captain_mobile'];
    $team_id = $row['id'];
    $select_players = "SELECT * FROM players WHERE id = '$team_id'";
 }
?>
</body>
</html>


