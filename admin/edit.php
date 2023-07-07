<?php require "../includes/dbconnect.php"?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
if (isset($_GET['id'])){
   $id = $_GET['id'];
   $select = "SELECT * FROM players WHERE id = '$id'";
   $result = $conn->query($select);
   $row = $result->fetch_assoc();
   ?>
   <div class="container">
    <input type="text" name = "team_name" value="<?php echo $row['id']?>">
   </div>
   <?php
}
?>
    
</body>
</html>

