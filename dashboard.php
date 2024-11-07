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

$admin_username = 'admin';
$admin_password = 'password123'; // This is the plaintext password
$admin_password_hash = password_hash($admin_password, PASSWORD_DEFAULT); // Hashing for security

if (
    !isset($_SERVER['PHP_AUTH_USER']) || !isset($_SERVER['PHP_AUTH_PW']) ||
    $_SERVER['PHP_AUTH_USER'] !== $admin_username ||
    $_SERVER['PHP_AUTH_PW'] !== $admin_password
) {
    header('WWW-Authenticate: Basic realm="Admin Dashboard"');
    header('HTTP/1.0 401 Unauthorized');
    echo 'Unauthorized access';
    exit;
}

// dashboard code goes here
echo "<h1>Welcome to the Admin Dashboard</h1>";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - View Data</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table,
        th,
        td {
            border: 1px solid #ddd;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        h2 {
            background-color: #4CAF50;
            color: white;
            padding: 10px;
        }
    </style>
</head>

<body>

    <h2>Contact Messages</h2>
    <table>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Message</th>
            <th>Submission Date</th>
        </tr>
        <?php
        $contact_sql = "SELECT * FROM ContactMessages ORDER BY SubmissionDate DESC";
        $contact_result = $conn->query($contact_sql);

        if ($contact_result->num_rows > 0) {
            while ($row = $contact_result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row['Name'] . "</td>
                        <td>" . $row['Email'] . "</td>
                        <td>" . $row['Message'] . "</td>
                        <td>" . $row['SubmissionDate'] . "</td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='4'>No contact messages found.</td></tr>";
        }
        ?>
    </table>

    <h2>Feedback Messages</h2>
    <table>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Message</th>
            <th>Submission Date</th>
        </tr>
        <?php
        $feedback_sql = "SELECT * FROM Feedback ORDER BY SubmissionDate DESC";
        $feedback_result = $conn->query($feedback_sql);

        if ($feedback_result->num_rows > 0) {
            while ($row = $feedback_result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row['Name'] . "</td>
                        <td>" . $row['Email'] . "</td>
                        <td>" . $row['Message'] . "</td>
                        <td>" . $row['SubmissionDate'] . "</td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='4'>No feedback messages found.</td></tr>";
        }
        ?>
    </table>

    <h2>Appointments</h2>
    <table>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Preferred Date</th>
            <th>Preferred Time</th>
            <th>Message</th>
            <th>Submission Date</th>
        </tr>
        <?php
        $appointment_sql = "SELECT * FROM Appointments ORDER BY SubmissionDate DESC";
        $appointment_result = $conn->query($appointment_sql);

        if ($appointment_result->num_rows > 0) {
            while ($row = $appointment_result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row['Name'] . "</td>
                        <td>" . $row['Email'] . "</td>
                        <td>" . $row['Phone'] . "</td>
                        <td>" . $row['PreferredDate'] . "</td>
                        <td>" . $row['PreferredTime'] . "</td>
                        <td>" . $row['Message'] . "</td>
                        <td>" . $row['SubmissionDate'] . "</td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='7'>No appointments found.</td></tr>";
        }
        ?>
    </table>

</body>

</html>

<?php
$conn->close();
?>