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
                <div class="nav_list"> <a href="#" class="nav_link active"> <i class='bx bx-grid-alt nav_icon'></i> <span class="nav_name">Dashboard</span> </a>
                            <a href="registrations.php" class="nav_link"> <i class='bx bx-user nav_icon'></i> <span class="nav_name">REGISTRATION</span> </a> 
                            <a href="" class="nav_link"> <i class='bx bx-message-square-detail nav_icon'></i> <span class="nav_name">TEAMS</span> </a> 
                            <a href="#" class="nav_link"> <i class='bx bx-bookmark nav_icon'></i> <span class="nav_name">MACHES</span> </a>
                 </div>
            </div> <a href="#" class="nav_link"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">SignOut</span> </a>
        </nav>
    </div>
    <!--Container Main start-->
    <div class="height-100 bg-light">
    <?php
require "../includes/dbconnect.php";
        $id = $_GET['id'];
        $select ="SELECT * FROM players WHERE team_id = '$id'";
        // Assuming you have established a database connection
        $result = $conn->query($select);
?>
<a href="registrations.php" class="btn btn-danger"><-back</a>
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>TEAM ID</th>
            <th>PLAYER NAME</th>
            <th>JURSY NUMBER</th>
            <th>PLAYER MOBILE</th>
            <th>PLAYER PHOTO</th>
            <th>JURSY NAME</th>
            <th>PLAYER ROLL</th>
            <th>JURSY SIZE</th>
        </tr>
    </thead>
    <tbody>
    <?php while ($row = $result->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['team_id']; ?></td>
            <td><?php echo $row['playername']; ?></td>
            <td><?php echo $row['jursynum']; ?></td>
            <td><?php echo $row['playermobile']; ?></td>
            <td>
                <?php if ($row['playerphoto']) { ?>
                    <img src="data:image/jpeg;base64,<?php echo base64_encode($row['playerphoto']); ?>" alt="Player Photo" style="max-width: 100px; max-height: 100px;">
                <?php } else { ?>
                    No image available
                <?php } ?>
            </td>
            <td><?php echo $row['jursyname']; ?></td>
            <td><?php echo $row['playerroll']; ?></td>
            <td><?php echo $row['jursysize']; ?></td>
            <td><a href="edit.php?id=<?php echo $row['id'];?>">edit</a></td>
        </tr>
    <?php } ?>
</tbody>

</table>
    </div>
    <!--Container Main end-->
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="../js/sidbar.js"></script>
</html>

