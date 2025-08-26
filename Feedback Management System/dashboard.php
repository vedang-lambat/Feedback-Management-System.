<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "feedback";

// Connect
$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM feedbacks ORDER BY submitted_at DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <style>
        body { font-family: Arial; padding: 20px; background: #f9f9f9; }
        table { width: 100%; border-collapse: collapse; background: white; }
        th, td { border: 1px solid #ccc; padding: 10px; text-align: left; }
        th { background: #4CAF50; color: white; }
        h2 { margin-bottom: 20px; }
    </style>
</head>
<body>
    <h2>Admin Dashboard - Feedbacks</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Message</th>
            <th>Submitted At</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>". $row['id'] ."</td>
                        <td>". htmlspecialchars($row['name']) ."</td>
                        <td>". htmlspecialchars($row['email']) ."</td>
                        <td>". htmlspecialchars($row['message']) ."</td>
                        <td>". $row['submitted_at'] ."</td>
                    </tr>";
            }
        } else {
            echo "<tr><td colspan='5'>No feedback found.</td></tr>";
        }
        $conn->close();
        ?>
    </table>
</body>
</html>