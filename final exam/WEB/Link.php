<!DOCTYPE html> 
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
  <body>
<?php
session_start();

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "website";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST['username'];
    $pass = $_POST['password'];

    // Prepare and bind statement
    $stmt = $conn->prepare("SELECT id, username, password FROM web WHERE username=?");
    $stmt->bind_param("s", $user);

    // Execute query
    $stmt->execute();

    // Get result
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($pass, $row['password'])) {
            $_SESSION['id'] = $row['id'];
            $_SESSION['username'] = $row['username'];
            header("Location: Link.php"); // Redirect to welcome page
            exit;
        } 
        if( $_SESSION['id']=$row['id'])
{
include("Home.html");
}
        else {
            // Incorrect credentials
            $error = "Invalid credentials";
        }
    } else {
        // User not found
        $error = "User not found";
    }

    // Close the statement
    $stmt->close();
}

// Close the database connection
$conn->close();
?>
</body>
</html>