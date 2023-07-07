<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SPL Registration Acknowledgment</title>

      <style>
                        /* Common styles for both screen and print */
                        body {
                            font-family: Arial, sans-serif;
                            margin: 0;
                            padding: 10px;
                           height: 100%;
                          
                           

/* Full height */
height: 100%;

/* Center and scale the image nicely */
background-position: center;
background-repeat: no-repeat;
background-size: cover;
                        }
                       

                        .pdf {
    width: 794px; /* Adjusted width */
    height: 1123px; /* Adjusted height */
    padding: 20mm;
    margin: 0 auto;
    margin-top:100px
    box-sizing: border-box;
    display: flex;
    justify-content: center;
    align-items: center;
    overflow: hidden;
    page-break-inside: avoid;
}

                        h3 {
                            text-align: center;
                            margin-bottom: 20px;
                        }

                        .top {
                            display: flex;
                            align-items: center;
                            margin-bottom: 30px;
                        }

                        .left {
                            flex-grow: 1;
                            justify-content: center;
                            margin-top:200px;
                            width:500px;
                            
                        }

                        .right {
                            width: 200px;
                            height: auto;
                            text-align: center;
                            padding-left: 20px;
                        }

                        .logo {
                            width: 100%;
                            max-width: 150px;
                            height: auto;
                         
                            background-blend-mode: screen;
                        }

                        .transactionid {
                            text-align: center;
                            background-color: green;
                            color: #fff;
                            padding: 10px;
                            margin-bottom: 30px;
                        }


                        .description {
                            margin-bottom: 30px;
                        }

                        ol {
                            margin-left: 30px;
                        }

                        li {
                            margin-bottom: 10px;
                        }
                        .footer {
    display: flex;
    justify-content: space-between; /* Align the items evenly */
    align-items: center; /* Center the items vertically */
    margin-top: 50px; /* Add some space above the footer */
  
   
}




        
                        /* Styles for print media type */
                        @media print {
                            body {
                                width: 794px;
                                height: 1123px;
                                margin: 0;
                                padding: 0;
                                overflow: hidden;
                            }

                            .pdf {
                                padding: 0mm;
                               
                            }
                            @media (max-width: 480px) {
                             .logo {
                                 max-width: 100px; /* Adjust the value as needed */
                              }
                              }

                            /* Rest of the styles remain unchanged */
                        }
                    </style>

    <script>
        function downloadPDF() {
            var htmlContent = document.getElementById('pdfContent').innerHTML;

            // Open a new window
            var win = window.open('', '_blank');

            // Generate the PDF content
            var pdfContent = `
                <!DOCTYPE html>
                <html lang="en">
                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <title>SPL Registration Acknowledgment</title>
                    <style>
                        /* Common styles for both screen and print */
                        body {
                            font-family: Arial, sans-serif;
                            margin: 0;
                            padding: 10px;
                           height: 100%;
                           background-image: url(../images/spl1.jpg);
                           

/* Full height */
height: 100%;

/* Center and scale the image nicely */
background-position: center;
background-repeat: no-repeat;
background-size: cover;
                        }
                       

                        .pdf {
    width: 794px; /* Adjusted width */
    height: 1123px; /* Adjusted height */
    padding: 20mm;
    margin: 0 auto;
    margin-top:100px
    box-sizing: border-box;
    display: flex;
    justify-content: center;
    align-items: center;
    overflow: hidden;
    page-break-inside: avoid;
}

                        h3 {
                            text-align: center;
                            margin-bottom: 20px;
                        }

                        .top {
                            display: flex;
                            align-items: center;
                            margin-bottom: 30px;
                        }

                        .left {
                            flex-grow: 1;
                            justify-content: center;
                            margin-top:200px;
                            width:490px;
                            text-transform: capitalize;
                            line-height:30px;
                           
                        }

                        .right {
                            width: 200px;
                            height: auto;
                            text-align: center;
                            padding-left: 20px;
                        }

                        .logo {
                            width: 100%;
                            max-width: 150px;
                            height: auto;
                         
                            background-blend-mode: screen;
                        }

                        .transactionid {
                            text-align: center;
                            background-color: green;
                            color: #fff;
                            padding: 10px;
                            margin-bottom: 30px;
                        }


                        .description {
                            margin-bottom: 30px;
                        }

                        ol {
                            margin-left: 30px;
                        }

                        li {
                            margin-bottom: 10px;
                        }
                        .footer {
    display: flex;
    justify-content: space-between; /* Align the items evenly */
    align-items: center; /* Center the items vertically */
    margin-top: 50px; /* Add some space above the footer */
  
   
}




        
                        /* Styles for print media type */
                        @media print {
                            body {
                                width: 794px;
                                height: 1123px;
                                margin: 0;
                                padding: 0;
                                overflow: hidden;
                            }

                            .pdf {
                                padding: 0mm;
                               
                            }
                            @media (max-width: 480px) {
                             .logo {
                                 max-width: 100px; /* Adjust the value as needed */
                              }
                              }

                            /* Rest of the styles remain unchanged */
                        }
                    </style>
                </head>
                <body class="pdfs">
                    <div class="pdf">
                        ${htmlContent}
                    </div>
                </body>
                </html>
            `;

            // Set the content of the new window to the PDF content
            win.document.write(pdfContent);

            // Close the document for writing
            win.document.close();

            // Print the document
            win.print();
        }
    </script>
</head>
<body>
    <?php
    require "../includes/dbconnect.php";
    $id = $_GET['id'];
    $select = "SELECT * FROM teams WHERE id = '$id'";
    $result = $conn->query($select);
    $row = $result->fetch_assoc();
    $captainName = $row['captain_name'];
    $teamName = $row['team_name'];
    $mobile = $row['mobile'];
    $tr_id = $row['tr_id'];
    ?>

    <div id="pdfContent">
      
        <div class="top">
            <center>
            <div class="left">
            <h2>TEAM NAME: <?php echo $teamName ?> </h2>
                <h2>CAPTAIN NAME: <span contenteditable="true"><?php echo $captainName ?></span> </h2>
                <h2>MOBILE: <?php echo $mobile ?></h2>
               
                <hr>
                <div class="tr" style = "margin-top:20px;">
                    <h2>Team registration fees</h2>
                <h1>Rs. 5000/-     <span>Received</span></h1>
                
                 </div>
            </div>
            </center>
        </div>    
</div>



        </div>
    </div>

    <div class="download">
        <button onclick="downloadPDF()">Download PDF</button>
    </div>
</body>
</html>
