<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] != 'admin') {
    header("Location: login.php");
    exit();
}

include 'db_config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $menu_id = $_POST['menu_id'];

    $sql = "UPDATE plates SET name='$name', description='$description', price='$price', menu_id='$menu_id' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Plate info updated successfully.";
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
    <title>Modify Plate</title>
</head>
<body>
    <h2>Modify Plate</h2>
    <form method="post" action="modify_plate.php">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="<?php echo $row['name']; ?>" required><br><br>
        <label for="description">Description:</label>
        <input type="text" id="description" name="description" value="<?php echo $row['description']; ?>" required><br><br>
        <label for="price">Price:</label>
        <input type="number" id="price" name="price" value="<?php echo $row['price']; ?>" required><br><br>
        <label for="menu_id">Menu ID:</label>
        <input type="number" id="menu_id" name="menu_id" value="<?php echo $row['menu_id']; ?>" required><br><br>
        <input type="submit" value="Update Plate">
    </form>
    <a href="admin_dashboard.php">Back to Dashboard</a>
</body>
</html>
