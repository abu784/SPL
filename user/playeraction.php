<?php
    // if (isset($_POST['submit'])){
      
        // $playername1 = $_POST['playername1'];
        // $playername2 = $_POST['playername2'];
        // $playername3 = $_POST['playername3'];
        // $playername4 = $_POST['playername4'];
        // $playername5 = $_POST['playername5'];
        // $playername6 = $_POST['playername6'];
        // $playername7 = $_POST['playername7'];
        // $playername8 = $_POST['playername8'];
        // $playername9 = $_POST['playername9'];
        // $playername10 = $_POST['playername10'];
        // $playername11 = $_POST['playername11'];
        // $playername12 = $_POST['playername12'];
        // $playername13 = $_POST['playername13'];
        // $playername14 = $_POST['playername14'];
        // $playername15 = $_POST['playername15'];
        // $jursynum1 = $_POST['jursynum1'];
        // $jursynum2 = $_POST['jursynum2'];
        // $jursynum3 = $_POST['jursynum3'];
        // $jursynum4 = $_POST['jursynum4'];
        // $jursynum5 = $_POST['jursynum5'];
        // $jursynum6 = $_POST['jursynum6'];
        // $jursynum7 = $_POST['jursynum7'];
        // $jursynum8 = $_POST['jursynum8'];
        // $jursynum9 = $_POST['jursynum9'];
        // $jursynum10 = $_POST['jursynum10'];
        // $jursynum11 = $_POST['jursynum11'];
        // $jursynum12 = $_POST['jursynum12'];
        // $jursynum13 = $_POST['jursynum13'];
        // $jursynum14 = $_POST['jursynum14'];
        // $jursynum15 = $_POST['jursynum15'];
        // $playermobile1 = $_POST['playermobile1'];
        // $playermobile2 = $_POST['playermobile2'];
        // $playermobile3 = $_POST['playermobile3'];
        // $playermobile4 = $_POST['playermobile4'];
        // $playermobile5 = $_POST['playermobile5'];
        // $playermobile6 = $_POST['playermobile6'];
        // $playermobile7 = $_POST['playermobile7'];
        // $playermobile8 = $_POST['playermobile8'];
        // $playermobile9 = $_POST['playermobile9'];
        // $playermobile10 = $_POST['playermobile10'];
        // $playermobile11 = $_POST['playermobile11'];
        // $playermobile12 = $_POST['playermobile12'];
        // $playermobile13 = $_POST['playermobile13'];
        // $playermobile14 = $_POST['playermobile14'];
        // $playermobile15 = $_POST['playermobile15'];
        // $playerphoto1 = $_FILES['playerphoto1'];
        // $playerphoto2 = $_FILES['playerphoto2'];
        // $playerphoto3 = $_FILES['playerphoto3'];
        // $playerphoto4 = $_FILES['playerphoto4'];
        // $playerphoto5 = $_FILES['playerphoto5'];
        // $playerphoto6 = $_FILES['playerphoto6'];
        // $playerphoto7 = $_FILES['playerphoto7'];
        // $playerphoto8 = $_FILES['playerphoto8'];
        // $playerphoto9 = $_FILES['playerphoto9'];
        // $playerphoto10 = $_FILES['playerphoto10'];
        // $playerphoto11 = $_FILES['playerphoto11'];
        // $playerphoto12 = $_FILES['playerphoto12'];
        // $playerphoto13 = $_FILES['playerphoto13'];
        // $playerphoto14 = $_FILES['playerphoto14'];
        // $playerphoto15 = $_FILES['playerphoto15'];
        
    // }

    
    require "../includes/dbconnect.php";

    // Check if the form is submitted
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Loop through the form inputs and insert the data
        for ($i = 1; $i <= 15; $i++) {
            $playerName = $_POST['playername' . $i];
            $jursyNum = $_POST['jursynum' . $i];
            $playerMobile = $_POST['playermobile' . $i];
            $playerPhoto = $_FILES['playerphoto' . $i]['tmp_name']; // Temporary file path
            $jursyName = $_POST['jursyname' . $i];
            $playerRoll = $_POST['playerroll' . $i];
            $jursySize = $_POST['jursysize' . $i];
            $id = $_POST['team_name'];
    
            // Perform any necessary validation or sanitization of the form data
    
            // Convert the image to blob
            $blobData = file_get_contents($playerPhoto);
    
            // Prepare the SQL statement
            $sql = "INSERT INTO players ( team_id,playername,jursynum,playermobile,playerphoto,jursyname,playerroll,jursysize) 
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    
            // Prepare the statement
            $stmt = mysqli_prepare($conn, $sql);
    
            // Bind parameters
            mysqli_stmt_bind_param($stmt, "ssssssss", $id, $playerName, $jursyNum, $playerMobile, $blobData, $jursyName, $playerRoll, $jursySize);
    
            // Execute the statement
            $result = mysqli_stmt_execute($stmt);
    
            // Handle the result (e.g., display success message or handle errors)
            if ($result) {
                echo "<script>alert('player added successfully');
                window.location = 'welcome2.php'</script>";
            } else {
                echo "Error: " . mysqli_error($connection);
            }
    
            // Close the statement
            mysqli_stmt_close($stmt);
        }
    }