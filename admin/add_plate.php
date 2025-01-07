<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] != 'admin') {
    header("Location: login.php");
    exit();
}

include 'db_config.php';

// Fetch menus
$menu_sql = "SELECT * FROM menus";
$menus = $conn->query($menu_sql);

// Fetch plates
$plate_sql = "SELECT * FROM plates";
$plates = $conn->query($plate_sql);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $menu_id = $_POST['menu_id'];
    $plate_id = $_POST['plate_id'];

    // Check if the combination already exists
    $check_sql = "SELECT * FROM menu_plates WHERE menu_id='$menu_id' AND plate_id='$plate_id'";
    $check_result = $conn->query($check_sql);

    if ($check_result->num_rows > 0) {
        echo "This plate is already added to the selected menu.";
    } else {
        $sql = "INSERT INTO menu_plates (menu_id, plate_id) VALUES ('$menu_id', '$plate_id')";

        if ($conn->query($sql) === TRUE) {
            echo "Plate added to menu successfully.";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Plate to Menu</title>
</head>
<body>
    <h2>Add Plate to Menu</h2>
    <form method="post" action="add_plate.php">
        <label for="menu_id">Menu:</label>
        <select id="menu_id" name="menu_id" required>
            <?php
            if ($menus->num_rows > 0) {
                while($menu = $menus->fetch_assoc()) {
                    echo "<option value='" . $menu['id'] . "'>" . $menu['title'] . "</option>";
                }
            } else {
                echo "<option value=''>No menus available</option>";
            }
            ?>
        </select><br><br>
        <label for="plate_id">Plate:</label>
        <select id="plate_id" name="plate_id" required>
            <?php
            if ($plates->num_rows > 0) {
                while($plate = $plates->fetch_assoc()) {
                    echo "<option value='" . $plate['id'] . "'>" . $plate['name'] . "</option>";
                }
            } else {
                echo "<option value=''>No plates available</option>";
            }
            ?>
        </select><br><br>
        <input type="submit" value="Add Plate to Menu">
    </form>
    
    <a href="admin_dashboard.php">Back to Dashboard</a>
    <a href="add-new_plate.php">ADD NEW PLATE</a>
</body>
</html>
