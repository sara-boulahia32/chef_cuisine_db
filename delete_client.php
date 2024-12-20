<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] != 'admin') {
    header("Location: login.php");
    exit();
}

include 'db_config.php';

// if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_GET['id'];

    $sql = "DELETE FROM users WHERE id='$id'";

    if ($conn->query($sql)) {
        echo "Client deleted successfully.";
    } else {
        echo "Error: " . $conn->error;
    }

// } else {
//     $id = $_GET['id'];
//     $sql = "SELECT * FROM users WHERE id=$id";
//     $result = $conn->query($sql);

//     if ($result->num_rows > 0) {
//         $row = $result->fetch_assoc();
//     } else {
//         echo "No client found with that ID.";
//         exit();
//     }
// }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Delete Client</title>
</head>
<body>
    <h2>Delete Client</h2>
    
    <a href="admin_dashboard.php">Back to Dashboard</a>
</body>
</html>
