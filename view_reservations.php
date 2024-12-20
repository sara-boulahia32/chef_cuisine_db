<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] != 'admin') {
    header("Location: login.php");
    exit();
}

include 'db_config.php';

$sql = "SELECT * FROM reservations";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html>
<head>
    <title>View Reservations</title>
</head>
<body>
    <h2>View Reservations</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Client ID</th>
            <th>Date</th>
            <th>Time</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['client_id'] . "</td>";
                echo "<td>" . $row['date'] . "</td>";
                echo "<td>" . $row['time'] . "</td>";
                echo "<td>" . $row['status'] . "</td>";
                echo "<td><a href='approve_reservation.php?id=" . $row['id'] . "'>Approve/Decline</a></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='6'>No reservations found</td></tr>";
        }
        ?>
    </table>
    <a href="admin_dashboard.php">Back to Dashboard</a>
</body>
</html>
