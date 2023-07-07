<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transcation ID</title>
</head>
<body>
    

<style>     
    /* Common styles for both screen and print */
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
    }

    .form-container {
        max-width: 400px;
        margin: 0 auto;
        padding: 20px;
        background-color: #f7f7f7;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    }

    .form-container h2 {
        text-align: center;
        margin-bottom: 20px;
    }

    .form-container input[type="text"] {
        width: 100%;
        padding: 10px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 3px;
        box-sizing: border-box;
    }

    .form-container input[type="submit"] {
        width: 100%;
        padding: 10px;
        background-color: #4CAF50;
        color: #fff;
        border: none;
        border-radius: 3px;
        cursor: pointer;
    }

    .form-container input[type="submit"]:hover {
        background-color: #45a049;
    }
</style>
<?php 
require "../includes/dbconnect.php";
if(isset($_GET['id'])){
    $id = $_GET['id'];
    ?>
 <div class="form-container">
    <!-- <h2>Update Transaction ID</h2> -->
    <form action="" method="post">
        <input type="text" name="transactionid" placeholder="Enter Transaction ID" required>
        <input type="submit" name="submit" value="Submit">
    </form>
</div>
    <?php
    if (isset($_POST['submit'])){
        $tr_id = $_POST['transactionid'];
    $paid = "UPDATE teams SET status = 'paid' , tr_id= '$tr_id' WHERE id = '$id'";
    if ($conn->query($paid)){
        header('Location: pdf.php?id=' . $id);
    } else{
        echo "<script>alert('canot update status');
        window.location ='registrations.php'</script>";
    }
}
}
?>
</body>
</html>