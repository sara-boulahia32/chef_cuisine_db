<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] != 'admin') {
    header("Location: login.php");
    exit();
}

include 'db_config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $status = $_POST['status'];

    $sql = "UPDATE reservations SET status='$status' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Reservation status updated successfully.";
        header("Location: admin_dashboard.php");

    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
} else {
    $id = $_GET['id'];
    $sql = "SELECT * FROM reservations WHERE id=$id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "No reservation found with that ID.";
        exit();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Approve/Decline Reservation</title>
</head>
<body>
    <h2>Approve/Decline Reservation</h2>
    <form method="post" action="decline_reservation.php">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <p>Reservation for client ID: <?php echo $row['client_id']; ?> on <?php echo $row['date']; ?> at <?php echo $row['time']; ?></p>
        <label for="status">Status:</label>
        <select id="status" name="status">
            <option value="approved">Approve</option>
            <option value="refused">Decline</option>
        </select><br><br>
        <input type="submit" value="Update Status">
    </form>
    <a href="admin_dashboard.php">Back to Dashboard</a>
</body>
</html>
