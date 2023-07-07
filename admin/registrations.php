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
                <div class="nav_list"> <a href="dashboard.php" class="nav_link"> <i class='bx bx-grid-alt nav_icon'></i> <span class="nav_name">Dashboard</span> </a>
                            <a href="registrations.php" class="nav_link  active"> <i class='bx bx-user nav_icon'></i> <span class="nav_name">REGISTRATION</span> </a> 
                            <a href="teams.php" class="nav_link"> <i class='bx bx-message-square-detail nav_icon'></i> <span class="nav_name">TEAMS</span> </a> 
                            <a href="jursy.php" class="nav_link"> <i class='bx bx-bookmark nav_icon'></i> <span class="nav_name">MACHES</span> </a>
                 </div>
            </div> <a href="#" class="nav_link"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">SignOut</span> </a>
        </nav>
    </div>
    <!--Container Main start-->

    <div class="height-100 bg-light">
        <form action="" method="post">
       REGISTRATIONS <select name="available" id="">
            <option value="1">on</option>
            <option value="0">off</option>
        </select>
        <input type="submit" name="isavailable">
        </form>
       <?php
        require "../includes/dbconnect.php";
       if(isset($_POST['isavailable'])){
        $available = $_POST['available'];
        $update = "UPDATE available SET is_available=$available WHERE id=1";
        $res_avail = $conn->query($update);
       }
       ?>
       
       <?php
       require "../includes/dbconnect.php";
       $select = "SELECT * FROM teams ORDER BY id DESC";
       $result = $conn->query($select);
     
       
        ?>
        <table class="table">
            <thead>
                <tr class="table-dark">
                    <th>id</th>
                    <th>TEAM NAME</th>
                    <th>CAPTAIN NAME</th>
                    <th>CAPTAIN MOBILE</th>
                    <th>PASSWORD</th>
                    <th>ADDRESS</th>
                    <th>STATUS</th>
                    <th>Tran_id</th>
                    <th>ACTION</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()){?>
                    <tr>
                        <td><?php echo $row['id']?></td>
                        <td><?php echo $row['team_name']?></td>
                        <td><?php echo $row['captain_name']?></td>
                        <td><?php echo $row['mobile']?></td>
                        <td><?php echo $row['password']?></td>
                        <td><?php echo $row['address']?></td>
                        <td><?php echo $row['status']?></td>
                        <td><?php echo $row['tr_id']?></td>
                        <td><a href="paid.php?id=<?php echo $row['id']?>" class="btn btn-success">paid</a>
                        <a href="cancel.php?id=<?php echo $row['id']?>" class="btn btn-danger">cancel</a>
                        <a class="btn btn-secondary" href="delete.php?id=<?php echo $row['id']?>" onclick="return confirm('Are you sure you want to delete this item?')">delete</a>
                        <a class="btn btn-secondary" href="view.php?id= <?php echo $row['id']?>">view</a>
                    </td>

                    </tr>
                <?php
                    }?>    
            </tbody>
        </table>
        <?php
        ?>
    </div>
    <!--Container Main end-->
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="../js/sidbar.js"></script>
</html>
