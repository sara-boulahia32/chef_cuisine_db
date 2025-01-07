<?php
session_start();

// Check if the user is logged in and is an admin
if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] != 'admin') {
    header("Location: login.php");
    exit();
}

include 'db_config.php';

// Fetch menus and their plates
$menu_sql = "SELECT menus.id AS menu_id, menus.title AS menu_title, menus.description AS menu_description, menus.price AS menu_price, 
                    plates.id AS plate_id, plates.name AS plate_name, plates.description AS plate_description, plates.price AS plate_price
             FROM menus
             LEFT JOIN menu_plates ON menus.id = menu_plates.menu_id
             LEFT JOIN plates ON menu_plates.plate_id = plates.id
             ORDER BY menus.id, plates.id";
$menus = $conn->query($menu_sql);

$menu_data = [];
if ($menus->num_rows > 0) {
    while ($row = $menus->fetch_assoc()) {
        $menu_id = $row['menu_id'];
        if (!isset($menu_data[$menu_id])) {
            $menu_data[$menu_id] = [
                'id' => $menu_id,
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

// Handle reservation submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $client_id = $_SESSION['user_id'];
    $menu_id = $_POST['menu_id'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $num_people = $_POST['num_people'];
    $check_user_sql = "SELECT id FROM users WHERE id = '$client_id'";
    $result = $conn->query($check_user_sql);

    if ($result->num_rows == 0) {
        die("Error: Client ID does not exist in the users table.");
    }
    $reservation_sql = "INSERT INTO reservations (client_id, menu_id, date, time, num_people, status) 
                        VALUES ('$client_id', '$menu_id', '$date', '$time', '$num_people', 'pending')";

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
    <!-- Navbar -->
    <div class="flex justify-between items-center bg-black px-8 py-4">
        <a href="#">
            <img src="img/cuisine_logo-removebg-preview.png" class="max-w-full h-auto w-[100px]" alt="logo">
        </a>
        <div class="hidden lg:flex space-x-8">
            <a href="menu.php" class="text-white lg:text-lg p-2 hover:bg-gray-700">Menu</a>
            <a href="activites.php" class="text-white lg:text-lg p-2 hover:bg-gray-700">Book a table</a>
            <a href="reservations.php" class="text-white lg:text-lg p-2 hover:bg-gray-700">Reservations</a>
            <a href="about.html" class="text-white lg:text-lg p-2 hover:bg-gray-700">The Chef</a>
            <a href="login.php" class="text-white lg:text-lg p-2 hover:bg-gray-700">Contact</a>
        </div>
    </div>

    <!-- Main Content -->
    <div class="container mx-auto px-6 py-10">
        <h2 class="text-4xl font-bold text-center text-gray-800 mb-8">Our Menus</h2>

        <?php if (!empty($menu_data)) { ?>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <?php foreach ($menu_data as $menu) { ?>
                    <div class="bg-white rounded-lg shadow-md p-6">
                        <h3 class="text-2xl font-bold text-gray-800 mb-2"><?php echo htmlspecialchars($menu['title']); ?></h3>
                        <p class="text-gray-600 mb-4"><?php echo htmlspecialchars($menu['description']); ?></p>
                        <p class="text-gray-800 font-semibold mb-4">Price: $<?php echo number_format($menu['price'], 2); ?></p>
                        <button 
                            class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600" 
                            onclick="openModal('<?php echo $menu['id']; ?>', '<?php echo htmlspecialchars($menu['title']); ?>')">
                            Reserve
                        </button>
                        <?php if (!empty($menu['plates'])) { ?>
                            <ul class="space-y-2 mt-4">
                                <?php foreach ($menu['plates'] as $plate) { ?>
                                    <li class="bg-gray-100 p-3 rounded">
                                        <p class="font-semibold"><?php echo htmlspecialchars($plate['name']); ?> - $<?php echo number_format($plate['price'], 2); ?></p>
                                        <p class="text-sm text-gray-600"><?php echo htmlspecialchars($plate['description']); ?></p>
                                    </li>
                                <?php } ?>
                            </ul>
                        <?php } else { ?>
                            <p class="text-gray-500">No plates available for this menu.</p>
                        <?php } ?>
                    </div>
                <?php } ?>
            </div>
        <?php } else { ?>
            <p class="text-gray-500 text-center">No menus available.</p>
        <?php } ?>

        
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


    <img src="img/SB-BANNER-281024.png" alt="">
    <footer class="relative bg-customCream">
        <div class="absolute inset-0 bg-cover bg-center " style="background-image: url('image/__.jpeg');">
            <div class="absolute inset-0 backdrop-blur-sm bg-black bg-opacity-30"></div>
        </div>
        <!-- top footer -->
        <section class="relative z-5 flex flex-col md:flex-row items-center justify-between px-8 md:px-40 mb-5">
            <img src="img/cuisine_logo-removebg-preview.png" width="100" alt="logo" >
            <div class="text-white">
                <h3 class="text-2xl font-semibold fontsinista">Follow us</h3>
                <div class="flex space-x-4">
                    <a href="#"><i class='bx bxl-facebook-circle'></i></a>
                    <a href="#"><i class='bx bxl-pinterest'></i></a>
                    <a href="#"><i class='bx bxl-whatsapp'></i></a>
                    <a href="#"><i class='bx bxl-instagram-alt'></i></a>
                </div>
            </div>
        </section>
        <div class="px-10">
            <hr class="border-t border-white opacity-80">
        </div>
    
        <!-- footer-body -->
        <section class="relative z-5  flex flex-col md:flex-row justify-between gap-10 sm:gap-20 px-14 py-10">
            <div class="flex flex-col sm:flex-row gap-10 md:gap-20 w-full">
                <div>
                    <h3 class="text-2xl font-semibold fontsinista mb-3 text-white">BLOC</h3>
                    <div class="text-2xl">
                        <div><a href="#" class="text-gray-700 hover:text-white">Home</a></div>
                        <div><a href="#" class="text-gray-700 hover:text-white">Favoris</a></div>
                        <div><a href="#" class="text-gray-700 hover:text-white">Modéles</a></div>
                        <div><a href="#" class="text-gray-700 hover:text-white">Services</a></div>
                        <div><a href="#" class="text-gray-700 hover:text-white">More</a></div>
                    </div>
                </div>
                <div>
                    <h3 class="text-2xl font-semibold fontsinista mb-3 text-white">ABOUT-US</h3>
                    <div class="text-2xl">
                        <p>(123) 456-7891</p>
                        <a href="#" class="text-gray-700 hover:text-white">BITEFOOD@gmail.co</a>
                        <p>Hay jerifate, Safi, Bouzid</p>
                        <div><a href="#" class="text-gray-700 hover:text-white">Careers</a></div>
                        <div><a href="#" class="text-gray-700 hover:text-white">Community</a></div>
                        <div><a href="#" class="text-gray-700 hover:text-white">Company</a></div>
                    </div>
                </div>
                
            </div>
            <div class="flex flex-col sm:flex-row gap-10 md:gap-10 sm:gap-4 w-full">
                <div>
                    <h3 class="text-2xl font-semibold fontsinista mb-3 text-white">DISCLAIMER</h3>
                    <div  class="text-2xl">
                        <p>Acess apps</p>
                        <a href="#" class="text-gray-700 hover:text-white">BITEFOOD@gmail.co</a>
                        <p>Dreaming Desktop</p>
                        <p>On the clouds</p>
                    </div>
                </div>
                <div>
                    <h3 class="text-2xl font-semibold fontsinista mb-3 text-white">SHOP</h3>
                    <div class="text-2xl">
                        <div><a href="#" class="text-gray-700 hover:text-white">Contact us</a></div>
                        <p>Subscribe</p>
                        <div><a href="#" class="text-gray-700 hover:text-white">Profil</a></div>
                    </div>
                </div>
                
            </div>
            
        </section>
        <div class="px-10">
            <hr class="border-t border-white opacity-80">
        </div>
    
        <!-- footer-bottom -->
        <div class="text-center py-10">
            <p class="relative z-5 text-lg text-gray-700 fontsinista font-semibold">© 2024 Codebenders. All rights reserved.</p>
        </div>
    </footer>

    <!-- Scripts -->
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
