<?php
session_start();

if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] != 'admin') {
    header("Location: login.php");
    exit();
}

include 'db_config.php';

// Fetch menus from the database
$sql = "SELECT * FROM menus";
$menus = $conn->query($sql);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $client_id = $_SESSION['user_id'];
    $menu_id = $_POST['menu_id'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $num_people = $_POST['num_people'];

    $reservation_sql = "INSERT INTO reservations (client_id, menu_id, date, time, num_people, status) VALUES ('$client_id', '$menu_id', '$date', '$time', '$num_people', 'pending')";

    if ($conn->query($reservation_sql) === TRUE) {
        $success_message = "Reservation made successfully.";
    } else {
        $error_message = "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Menus</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto px-6 py-10">
        <h2 class="text-4xl font-bold text-center text-gray-800 mb-8">Our Menus</h2>

        <?php if (isset($success_message)) { ?>
            <p class="bg-green-100 text-green-800 px-4 py-2 rounded mb-6"><?php echo $success_message; ?></p>
        <?php } ?>

        <?php if (isset($error_message)) { ?>
            <p class="bg-red-100 text-red-800 px-4 py-2 rounded mb-6"><?php echo $error_message; ?></p>
        <?php } ?>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php if ($menus->num_rows > 0) { ?>
                <?php while($menu = $menus->fetch_assoc()) { ?>
                    <div class="bg-white rounded-lg shadow-md p-6">
                        <h3 class="text-2xl font-bold text-gray-800 mb-2"><?php echo $menu['title']; ?></h3>
                        <p class="text-gray-600 mb-4"><?php echo $menu['description']; ?></p>
                        <p class="text-gray-800 font-semibold mb-4">Price: $<?php echo number_format($menu['price'], 2); ?></p>
                        <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600" onclick="openModal('<?php echo $menu['id']; ?>', '<?php echo $menu['title']; ?>')">Reserve</button>
                    </div>
                <?php } ?>
            <?php } else { ?>
                <p class="text-gray-500 text-center">No menus available.</p>
            <?php } ?>
        </div>

        <div class="text-center mt-8">
            <a href="user_dashboard.php" class="text-white bg-blue-500 px-6 py-2 rounded hover:bg-blue-600">Back to Dashboard</a>
        </div>
    </div>

    <!-- Reservation Modal -->
    <div id="reservation-modal" class="fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center hidden">
        <div class="bg-white rounded-lg p-8 w-full max-w-md">
            <h2 class="text-2xl font-bold text-gray-800 mb-4">Make a Reservation</h2>
            <form method="post" action="">
                <input type="hidden" id="menu_id" name="menu_id">
                <p class="text-gray-600 mb-4"><strong>Menu:</strong> <span id="menu_title"></span></p>

                <label for="date" class="block text-gray-700">Date:</label>
                <input type="date" id="date" name="date" class="w-full border rounded px-3 py-2 mb-4" required>

                <label for="time" class="block text-gray-700">Time:</label>
                <input type="time" id="time" name="time" class="w-full border rounded px-3 py-2 mb-4" required>

                <label for="num_people" class="block text-gray-700">Number of People:</label>
                <input type="number" id="num_people" name="num_people" class="w-full border rounded px-3 py-2 mb-4" required>

                <div class="flex justify-end">
                    <button type="button" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600 mr-2" onclick="closeModal()">Cancel</button>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Reserve</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function openModal(menuId, menuTitle) {
            document.getElementById('menu_id').value = menuId;
            document.getElementById('menu_title').textContent = menuTitle;
            document.getElementById('reservation-modal').classList.remove('hidden');
        }

        function closeModal() {
            document.getElementById('reservation-modal').classList.add('hidden');
        }
    </script>
</body>
</html>
