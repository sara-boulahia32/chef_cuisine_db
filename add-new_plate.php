<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] != 'admin') {
    header("Location: login.php");
    exit();
}

include 'db_config.php';

// Gestion de l'ajout d'un nouveau plat
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_plate'])) {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    $sql = "INSERT INTO plates (name, description, price) VALUES ('$name', '$description', '$price')";

    if ($conn->query($sql) === TRUE) {
        echo "Plate added successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Gestion de l'ajout d'un plat à un menu
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_to_menu'])) {
    $menu_id = $_POST['menu_id'];
    $plate_id = $_POST['plate_id'];

    // Vérification si la combinaison existe déjà
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
}

// Récupération des menus et des plats
$menu_sql = "SELECT * FROM menus";
$menus = $conn->query($menu_sql);

$plate_sql = "SELECT * FROM plates";
$plates = $conn->query($plate_sql);

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Plates and Menus</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
 <!-- Navbar -->
 <nav class="bg-black shadow-md p-4 flex justify-between items-center">
        <div class="flex items-center">
            <a href="#">
                <!-- <img src="img/cuisine_logo-removebg-preview.png" class=" h-[50px] w-[50px]" alt="logo"> -->
            </a>
            <h1 class="text-2xl font-bold text-white">Dashboard Panel</h1>
        </div>
        <div class="flex items-center">
            <span class="mr-4 text-white">Hello, <strong>Chef Sara</strong></span>
            <img src="https://via.placeholder.com/40" alt="profile" class="rounded-full w-10 h-10">
        </div>
    </nav>

       
<div class="flex h-screen">
  <!-- Sidebar -->
  <aside class="w-64 bg-gray-800">
      
      <nav class="mt-8">
          <a href="#" class="block py-2 px-4 text-gray-400 hover:bg-gray-700 hover:text-white">Dashboard</a>
          <a href="view_menus.php" class="block py-2 px-4 text-gray-400 hover:bg-gray-700 hover:text-white"> View Menus</a>
          <a href="make_reservation.php" class="block py-2 px-4 text-gray-400 hover:bg-gray-700 hover:text-white"> Make a reservation</a>
          <a href="view_reservations.php" class="block py-2 px-4 text-gray-400 hover:bg-gray-700 hover:text-white">View reservations</a>
          <a href="logout.php" class="block py-2 px-4 text-gray-400 hover:bg-gray-700 hover:text-white">Logout</a>
      </nav>
  </aside>
  <main class="flex-1  overflow-y-auto">
    <div class="container mx-auto p-4">
        <!-- Welcome Section -->
    <div class="bg-white p-6 rounded-lg shadow-md mb-6 flex justify-between items-center">
      <div>
        <h2 class="text-3xl font-semibold text-gray-800">Welcome, Sara!</h2>
        <p class="text-gray-600 mt-2">Here is the history of your reservations</p>
      </div>
      <div>
        <img src="https://via.placeholder.com/120" alt="chef icon" class="w-32">
      </div>
    </div>
<div class="flex h-screen">
    <!-- Main Content -->
    <main class="flex-1 p-6 overflow-y-auto">
        <h2 class="text-2xl font-bold mb-6">Manage Plates and Menus</h2>

        <!-- Formulaire pour ajouter un plat -->
        <div class="bg-white p-6 rounded shadow mb-6">
            <h3 class="text-xl font-bold mb-4">Add a New Plate</h3>
            <form method="post" action="">
                <input type="hidden" name="add_plate" value="1">
                <div class="mb-4">
                    <label for="name" class="block text-gray-700">Name</label>
                    <input type="text" id="name" name="name" class="w-full border px-2 py-1" required>
                </div>
                <div class="mb-4">
                    <label for="description" class="block text-gray-700">Description</label>
                    <input type="text" id="description" name="description" class="w-full border px-2 py-1" required>
                </div>
                <div class="mb-4">
                    <label for="price" class="block text-gray-700">Price</label>
                    <input type="number" id="price" name="price" step="0.01" class="w-full border px-2 py-1" required>
                </div>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Add Plate</button>
            </form>
        </div>

        <!-- Formulaire pour ajouter un plat à un menu -->
        <div class="bg-white p-6 rounded shadow">
            <h3 class="text-xl font-bold mb-4">Add a Plate to a Menu</h3>
            <form method="post" action="">
                <input type="hidden" name="add_to_menu" value="1">
                <div class="mb-4">
                    <label for="menu_id" class="block text-gray-700">Menu</label>
                    <select id="menu_id" name="menu_id" class="w-full border px-2 py-1" required>
                        <?php
                        if ($menus->num_rows > 0) {
                            while ($menu = $menus->fetch_assoc()) {
                                echo "<option value='" . $menu['id'] . "'>" . $menu['title'] . "</option>";
                            }
                        } else {
                            echo "<option value=''>No menus available</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="plate_id" class="block text-gray-700">Plate</label>
                    <select id="plate_id" name="plate_id" class="w-full border px-2 py-1" required>
                        <?php
                        if ($plates->num_rows > 0) {
                            while ($plate = $plates->fetch_assoc()) {
                                echo "<option value='" . $plate['id'] . "'>" . $plate['name'] . "</option>";
                            }
                        } else {
                            echo "<option value=''>No plates available</option>";
                        }
                        ?>
                    </select>
                </div>
                <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Add to Menu</button>
            </form>
        </div>
    </main>
</div>


    <!-- Footer -->
    <footer class="bg-gray-800 text-white text-center p-4">
        <p>&copy; 2024 Chef's Gastronomic Experience. All rights reserved.</p>
    </footer>

</body>
</html>
