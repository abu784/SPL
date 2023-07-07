
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>
   
    <!-- Dashboard content goes here -->
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="../css/admin.css">
    <title>SPL | DASHBOARD</title>
</head>

<body id="body-pd">
    <header class="header" id="header">
        <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
        
    </header>
    <div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div> <a href="#" class="nav_logo"> <i class='bx bx-layer nav_logo-icon'></i> <span class="nav_logo-name">SMART REACH</span> </a>
                <div class="nav_list"> <a href="#" class="nav_link "> <i class='bx bx-grid-alt nav_icon'></i> <span class="nav_name">Dashboard</span> </a>
                            <a href="registrations.php" class="nav_link"> <i class='bx bx-user nav_icon'></i> <span class="nav_name">REGISTRATION</span> </a> 
                            <a href="teams.php" class="nav_link"> <i class='bx bx-message-square-detail nav_icon'></i> <span class="nav_name">TEAMS</span> </a> 
                            <a href="jursy.php" class="nav_link"> <i class='bx bx-bookmark nav_icon'></i> <span class="nav_name">MACHES</span> </a>
                            <a href="paidteam.php" class="nav_link active"> <i class='bx bx-bookmark nav_icon'></i> <span class="nav_name">PAID</span> </a>
                 </div>
            </div> <a href="logout.php" class="nav_link"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">SignOut</span> </a>
        </nav>
    </div>
    <!--Container Main start-->
    <div class="height-100 bg-light">
    <?php
  require "../includes/dbconnect.php";
  $select = "SELECT * FROM teams WHERE status = 'paid'";
  $result = $conn->query($select);
  ?>
  <table class="table">
    <thead>
    <tr>
       <thead >
         <tr>
         <th>ID</th>
         <th>CAPTAIN NAME</th>
         <th>TEAM NAME</th>
         <th>MOBILE</th>
         <th>ADDRESS</th>
         <th>TRANS</th>
         </tr>
      </thead>
    <tbody>
    <?php while ($row = $result->fetch_assoc()) {?>
    <tr>
      <td><?php echo $row['id'];?></td>
      <td><?php echo $row['captain_name'];?></td>
      <td><?php echo $row['team_name'];?></td>
      <td><?php echo $row['mobile'];?></td>
      <td><?php echo $row['address'];?></td>
      <td><?php echo $row['tr_id'];?></td>

    </tr>
<?php }?>
    </tbody>
    </tr>
    <thead>
    </table>
    </div>
    <!--Container Main end-->
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="../js/sidbar.js"></script>
</html>

   
</body>
</html>