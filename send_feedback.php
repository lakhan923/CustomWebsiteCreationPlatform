<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "new_password";
$dbname = "web_dev_co";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare and bind
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // SQL query to insert data
    $sql = "INSERT INTO Feedback (Name, Email, Message) VALUES (?, ?, ?)";

    $stmt = $conn->prepare($sql);

    // Bind parameters
    $stmt->bind_param("sss", $name, $email, $message);// "sss" means 3 strings

    // Execute the statement
    if ($stmt->execute()) {
        echo "Feedback submitted successfully";
    } else {
        echo "Error: " . $stmt->error; // Use $stmt->error for detailed error
    }

    $stmt->close(); // Close the prepared statement
}

$conn->close(); // Close the database connection
