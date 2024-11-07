<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Database connection
$servername = "localhost";
$username = "root";
$password = "new_password";
$dbname = "web_dev_co";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Capture POST data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Prepare the SQL statement
    $stmt = $conn->prepare("INSERT INTO ContactMessages (Name, Email, Message) VALUES (?, ?, ?)");

    // Check if the statement was prepared successfully
    if (!$stmt) {
        die("Statement preparation failed: " . $conn->error);
    }

    // Bind parameters (string, string, string)
    $stmt->bind_param("sss", $name, $email, $message);

    // Execute the query
    if ($stmt->execute()) {
        echo "Message submitted successfully!";
    } else {
        echo "Database insertion error: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
} else {
    echo "No POST data received";
}

// Close the connection
$conn->close();
