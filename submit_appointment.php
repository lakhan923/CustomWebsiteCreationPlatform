<?php
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

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO Appointments (Name, Email, Phone, PreferredDate, PreferredTime, Message) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssss", $name, $email, $phone, $preferredDate, $preferredTime, $message);

// Assign values from the form
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$preferredDate = $_POST['preferred-date'];
$preferredTime = $_POST['preferred-time'];
$message = $_POST['message'];

// Execute the statement
if ($stmt->execute()) {
    echo "Appointment request submitted successfully.";
} else {
    echo "Error: " . $stmt->error;
}

// Close connections
$stmt->close();
$conn->close();
