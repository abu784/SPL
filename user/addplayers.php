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
$mobile = $row['mobile'];
$id = $row['id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="../css/admin.css">
    <title>SPL | DASHBOARD</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <style>
        .welcome{
            text-transform:uppercase;
        }
        .form-footer {
    display: flex;
    justify-content: center;
  
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
                <div class="nav_list"> <a href="userdashboard.php" class="nav_link "> <i class='bx bx-grid-alt nav_icon'></i> <span class="nav_name">Dashboard</span> </a>
                            <a href="#" class="nav_link active"> <i class='bx bx-user nav_icon'></i> <span class="nav_name">ADD PLAYES</span> </a> 
                            <a href="" class="nav_link"> <i class='bx bx-message-square-detail nav_icon'></i> <span class="nav_name">TEAMS</span> </a> 
                            <a href="" class="nav_link"> <i class='bx bx-bookmark nav_icon'></i> <span class="nav_name">MACHES</span> </a>
                 </div>
            </div> <a href="logout.php" class="nav_link"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">SignOut</span> </a>
        </nav>
    </div>
    <!--Container Main start-->
    <div class="height-100 bg-light mt-5">
  <form action="playeraction.php" method="post" enctype="multipart/form-data">
    <input type="hidden" value="<?php echo $id?>" name="team_name">
    <div class="table-responsive">
      <table class="table">
        <thead>
          <tr>
            <th>S.No</th>
            <th>NAME & JURSY NUMBER</th>
            <th>MOBILE</th>
            <th>PLAYER PHOTO</th>
            <th>JURSY NAME</th>
            <th>PLAYER ROLL</th>
            <th>JURSY SIZE</th>
          </tr>
        </thead>
        <tbody>
  <?php for ($i = 1; $i <= 15; $i++) { ?>
    <tr>
      <td><?php echo $i; ?></td>
      <td>
        <input class="form-control" type="text" name="playername<?php echo $i; ?>" placeholder="player name">
        <input type="text" class="form-control" name="jursynum<?php echo $i; ?>" placeholder="jersey number">
      </td>
      <td>
        <input class="form-control" type="number" name="playermobile<?php echo $i; ?>" placeholder="player mobile">
      </td>
      <td>
        <input type="file" name="playerphoto<?php echo $i; ?>" placeholder="player photo" onchange="previewImage(event, 'preview<?php echo $i; ?>')">
        <img id="preview<?php echo $i; ?>" src="#" alt="Preview" style="max-width: 100px; max-height: 100px; display: none;">
      </td>
      <td>
        <input class="form-control" type="text" name="jursyname<?php echo $i; ?>" placeholder="jersey name">
      </td>
      <td>
        <select class="" name="playerroll<?php echo $i; ?>" id="" onchange="checkSelection(this)">
        <option value="">select</option>
          <option value="captain">captain</option>
          <option value="wisecaptain">wise captain</option>
          <option value="wicketkeeper">wicket keeper</option>
          <option value="batsman">batsman</option>
          <option value="bowler">bowler</option>
          <option value="allrounder">all rounder</option>
        </select>
      </td>
      <td>
        <select class="form-control" name="jursysize<?php echo $i; ?>" id="">
        <option value="">select</option>
          <option value="s">S</option>
          <option value="m">M</option>
          <option value="l">L</option>
          <option value="xl">XL</option>
          <option value="xxl">XXL</option>
        </select>
      </td>
    </tr>
  <?php } ?>
</tbody>

<script>
  // Function to check the selection and update input field style
  function checkSelection(selectElement) {
    var selectedValue = selectElement.value;
    var selectFields = document.querySelectorAll('select[name="' + selectElement.name + '"]');
    var inputField = selectElement.parentNode.previousElementSibling.firstElementChild;
    var count = 0;

    for (var i = 0; i < selectFields.length; i++) {
      if (selectFields[i].value === selectedValue) {
        count++;
      }
    }

    if (count > 1) {
      inputField.style.backgroundColor = 'red';
    } else {
      inputField.style.backgroundColor = '';
    }
  }

  // Add event listeners to select elements
  var selectElements = document.querySelectorAll('select[name^="playerroll"]');
  for (var i = 0; i < selectElements.length; i++) {
    selectElements[i].addEventListener('change', function() {
      checkSelection(this);
    });
  }
</script>




      </table>
    </div>

    <!-- Inside your form -->
    <div class="form-footer m-3">
      <input type="submit" name="submit" class="btn btn-success">
    </div>
  </form>
</div>






<script>
  function previewImage(event, previewId) {
    var input = event.target;
    var preview = document.getElementById(previewId);

    if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function (e) {
        preview.src = e.target.result;
        preview.style.display = 'block';
      };

      reader.readAsDataURL(input.files[0]);
    } else {
      preview.src = '#';
      preview.style.display = 'none';
    }
  }
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="../js/sidbar.js"></script>
</html>
