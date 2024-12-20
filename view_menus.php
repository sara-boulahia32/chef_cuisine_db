<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] != 'admin') {
    header("Location: login.php");
    exit();
}

include 'db_config.php';

// Fetch menus and their plates
$menu_sql = "SELECT menus.id AS menu_id, menus.title AS menu_title, menus.description AS menu_description, menus.price AS menu_price, plates.id AS plate_id, plates.name AS plate_name, plates.description AS plate_description, plates.price AS plate_price
             FROM menus
             LEFT JOIN menu_plates ON menus.id = menu_plates.menu_id
             LEFT JOIN plates ON menu_plates.plate_id = plates.id
             ORDER BY menus.id, plates.id";
$menus = $conn->query($menu_sql);

$menu_data = [];
if ($menus->num_rows > 0) {
    while($row = $menus->fetch_assoc()) {
        $menu_id = $row['menu_id'];
        if (!isset($menu_data[$menu_id])) {
            $menu_data[$menu_id] = [
                'title' => $row['menu_title'],
                'description' => $row['menu_description'],
                'price' => $row['menu_price'],
                'plates' => []
            ];
        }
        if ($row['plate_id']) {
            $menu_data[$menu_id]['plates'][] = [
                'name' => $row['plate_name'],
                'description' => $row['plate_description'],
                'price' => $row['plate_price']
            ];
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Menus</title>
</head>
<body>
    <h2>View Menus</h2>
    <?php
    if (!empty($menu_data)) {
        foreach ($menu_data as $menu_id => $menu) {
            echo "<h3>" . $menu['title'] . " - $" . $menu['price'] . "</h3>";
            echo "<p>" . $menu['description'] . "</p>";
            if (!empty($menu['plates'])) {
                echo "<ul>";
                foreach ($menu['plates'] as $plate) {
                    echo "<li>" . $plate['name'] . " - $" . $plate['price'] . "<br>" . $plate['description'] . "</li>";
                }
                echo "</ul>";
            } else {
                echo "<p>No plates available for this menu.</p>";
            }
        }
    } else {
        echo "<p>No menus available.</p>";
    }
    ?>
    <a href="user_dashboard.php">Back to Dashboard</a>
</body>
</html>
