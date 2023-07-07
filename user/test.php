<?php
// session_start();

// // Check if the counter session variable exists
// if (!isset($_SESSION['counter'])) {
//     $_SESSION['counter'] = 0; // Set the initial count to 1
// } else {
//     $_SESSION['counter']++; // Increment the count by 1
// }

// // Multiply the count by 10
// $_SESSION['counter'] += 15;

// // Output the count
// echo "Visitor count: " . $_SESSION['counter'];
// ?>

<!-- <!DOCTYPE html>
<html>
<head>
    <title>Website Visitor Count</title>
</head>
<body>
    <h1>Welcome to my website!</h1>

    <p>
        <?php// include 'counter.php'; ?>
    </p>

    Rest of your website content -->
<!-- </body>
</html> -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;600&display=swap');
        :root{
            --heading--:'Poppins', sans-serif;
            --paragraph--:'Poppins', sans-serif;
        }
        .confirm{
            display:flex;
            margin:20px;
            margin-top:50px;
            flex-wrap:wrap;
        }
        .left{
            padding:5px;
            margin-right:100px;
        }
        .left-head{
            font-family:var(--heading--);
        }.left-ctn{
            font-family:var(--paragraph--);
        }input[type="password"],
        input[type="file"]{
            width:100%;
            padding: 5px;
            margin:10px;
        }form{
            margin : 50px;  
        }.right{
            justify-content:center;
            align-items:center;
            font-family:var(--heading--);
        }

    </style>
</head>

<body>
    <div class="confirm">
        <div class="left">
            <div class="left-head">
                <h1 class="head">YOUR REGISTRATION HAS SUCCESSFULL <br> PLEASE FILL THE DETEILS</h1>
            </div>
            <hr>
            <div class="left-ctn">
                <p>
                    PLASE MAKE YOUR REGISTRATION FEES OF <span><strong> Rs. 5000 /-</strong></span> to confirm your
                    request
                </p>
                <ul>
                    <li>SCAN THE QR CODE TO MAKE PAYMENT </li>
                    <li>ENTER 5000 RUPEES</li>
                    <li>COPY THE TRANSACTION ID PAST BELOW </li>
                    <li>TACK SCREEN SHOT OF YOUR PAYMENT UPLOAD IT BELOW</li>
                </ul>
    <form action="">
        <input type="password" name='transaction_id' placeholder="Enter your transaction id"><br>
        <input type="file" name='screen_shot'>
    </form>
            </div>
        </div>
        <div class="right">
            <div class="card">
                <h3>SMART REACH </h3>
                <img src="../img/qr.jpg" alt="">
                <h3>SCAN HERE TO MAKE PAYMENT</h3>
            </div>
        </div>
    </div>
</body>

</html>