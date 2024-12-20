<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] != 'admin') {
    header("Location: login.php");
    exit();
}

include 'db_config.php';

if (isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];

    $sql = "DELETE FROM plates WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Plate deleted successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
} else {
    $id = $_GET['id'];
    $sql = "SELECT * FROM plates WHERE id=$id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "No plate found with that ID.";
        exit();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Delete Plate</title>
</head>
<body>
    <h2>Delete Plate</h2>
    <form method="post" action="delete_plate.php">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <p>Are you sure you want to delete the plate: <?php echo $row['name']; ?>?</p>
        <input type="submit" value="Delete Plate">
    </form>
    <a href="admin_dashboard.php">Back to Dashboard</a>
</body>
</html>
