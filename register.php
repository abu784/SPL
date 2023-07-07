<?php
require "includes/dbconnect.php";
$select = "SELECT * FROM available WHERE id = 1";
$res_sel = $conn->query($select);
$row = $res_sel->fetch_assoc();
$isavailable = $row['is_available'];
if (!$isavailable == 1) {
    header("location:register1.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Registration Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h1>PLEASE ENTER YOUR DETAILS HERE</h1>
    <div class="container">
<form method="post" action="action.php">
    <div class="form-group">
        <label for="team_name">Team Name:</label>
        <input type="text" class="form-control" id="team_name" name="team_name" required>
    </div>
    <div class="form-group">
        <label for="captain_name">Captain Name:</label>
        <input type="text" class="form-control" id="captain_name" name="captain_name" required>
    </div>
    <div class="form-group">
        <label for="captain_mobile">Captain Mobile:</label>
        <input type="text" class="form-control" id="captain_mobile" name="captain_mobile" required>
        <span id="captain_mobile_error" class="error-message"></span>
    </div>
    <div class="form-group">
        <label for="address">Address:</label>
        <textarea class="form-control" id="address" name="address" required></textarea>
    </div>
    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
</form>
</div>
</div>
<script>
    // Function to validate Captain Mobile field
    function validateCaptainMobile() {
        var captainMobile = this.value;
        var isValid = /^\d{10}$/.test(captainMobile); // Checks if exactly 10 digits are entered

        if (!isValid) {
            this.style.borderColor = "red";
            document.getElementById("captain_mobile_error").textContent = "Please enter exactly 10 numbers.";
        } else {
            this.style.borderColor = "";
            document.getElementById("captain_mobile_error").textContent = "";
        }
    }

    // Attach event listener to the Captain Mobile field
    document.getElementById("captain_mobile").addEventListener("input", validateCaptainMobile);
</script>

<style>
    .error-message {
        color: red;
    }
</style>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
