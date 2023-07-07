<?php
require "./includes/dbconnect.php";
if (isset($_POST['submit'])){
    $team_name = $_POST['team_name'];
    $captain_name = $_POST['captain_name'];
    $captain_mobile = $_POST['captain_mobile'];
    $address = $_POST['address'];
    $status = "inactive";
    $sql = "INSERT INTO teams(team_name, captain_name, mobile, address, password, status) VALUES ('$team_name', '$captain_name', '$captain_mobile', '$address', '$captain_mobile', '$status')";
    $api ="http://text.salemsmartreach.com/vb/apikey.php?apikey=bWlc3bRM8slEoBVG&senderid=MINGAM&number=9566457859&message=Dear%20XXX,%20Welcome%20to%20MINNAGAM%20Mobile%20APP%20Your%20One%20Time%20Password%20for%20Verification%20of%20your%20Mobile%20Number%20XXX%20is%20:%20XXX%20Regards,%20MINNAGAM%20Team";



    if($conn->query($sql)){
        $resultMessage = "Successfully sent registration. Please wait for confirmation we will contact you";
    }else{
        $resultMessage = "Failed to send registration.";
    }
    $response = file_get_contents($api);

    if($response!='')
    {
    echo '<script>';
    echo "alert('Complaint Submitted Successfully!! Complaint Number : $cnumber')";
    echo '</script>';
   
     }
    }else{
    echo '<script>';
    echo "alert('Already Submitted')";
    echo '</script>';
    
 
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Registration Result</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

<!-- Modal -->
<div class="modal fade show" id="resultModal" tabindex="-1" role="dialog" aria-labelledby="resultModalLabel" aria-hidden="true" style="display: block;">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="resultModalLabel">Registration Result</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p><?php echo $resultMessage; ?></p>
        <a href="tel:6383207901" class="btn btn-primary">Call Us</a>
      </div>
      <div class="modal-footer">
        <a type="button" href = "index.php" class="btn btn-secondary" data-dismiss="modal">OK</a>
      </div>
    </div>
  </div>
</div>

</body>
</html>
