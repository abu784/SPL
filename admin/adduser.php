<h1>Registration</h1>
<form method="POST" action="">
    <label for="username">Username:</label>
    <input type="text" name="username" id="username" required><br>

    <label for="password">Password:</label>
    <input type="password" name="password" id="password" required><br>

    <label for="email">Email:</label>
    <input type="email" name="email" id="email" required><br>

    <input type="submit" value="Register">
</form>
<?php
// Connect to the database
require "../includes/dbconnect.php";
// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    // Perform any necessary validation on the submitted data

    // Insert the user data into the database
    $insertQuery = "INSERT INTO users (username, password, email) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($insertQuery);
    $stmt->bind_param("sss", $username, $password, $email);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo "Registration successful";
    } else {
        echo "Failed to register";
    }

    $stmt->close();
}

// Close the database connection
$conn->close();
?>
