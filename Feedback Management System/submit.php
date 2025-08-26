<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "feedback";

// Connect to database
$conn = new mysqli($host, $user, $pass, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get values
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

// Insert query
$sql = "INSERT INTO feedbacks (name, email, message) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $name, $email, $message);

if ($stmt->execute()) {
    echo "Feedback submitted successfully! <a href='dashboard.php'>View Dashboard</a>";
} else {
    echo "Error: " . $stmt->error;
}

$conn->close();
?>