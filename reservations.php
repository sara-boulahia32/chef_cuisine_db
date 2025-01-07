<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] != 'admin') {
    header("Location: login.php");
    exit();
}

include 'db_config.php';

$sql = "SELECT * FROM menus";
$menus = $conn->query($sql);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $client_id = $_SESSION['user_id'];
    $menu_id = $_POST['menu_id'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $num_people = $_POST['num_people'];

    $sql = "INSERT INTO reservations (client_id, menu_id, date, time, num_people, status) VALUES ('$client_id', '$menu_id', '$date', '$time', '$num_people', 'pending')";

    if ($conn->query($sql) === TRUE) {
        echo "Reservation made successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Make a Reservation</title>
</head>
<body>
    <h2>Make a Reservation</h2>
    <form method="post" action="reservations.php">
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
        <label for="date">Date:</label>
        <input type="date" id="date" name="date" required><br><br>
        <label for="time">Time:</label>
        <input type="time" id="time" name="time" required><br><br>
        <label for="num_people">Number of People:</label>
        <input type="number" id="num_people" name="num_people" required><br><br>
        <input type="submit" value="Make Reservation">
    </form>
    <a href="user_dashboard.php">Back to Dashboard</a>
</body>
</html>
