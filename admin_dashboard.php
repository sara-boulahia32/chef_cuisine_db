<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] != 'admin') {
    header("Location: login.php");
    exit();
}

include 'db_config.php';

// Traitement des actions Approve/Decline
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action'], $_POST['id'])) {
    $id = intval($_POST['id']);
    $status = $_POST['action'] === 'approve' ? 'approved' : 'refused';

    $sql = "UPDATE reservations SET status='$status' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        $message = "Reservation status updated successfully.";
    } else {
        $message = "Error updating reservation: " . $conn->error;
    }
}
$sqll="SELECT * FROM users JOIN reservations ON users.id=reservations.client_id WHERE date>CURDATE() ORDER BY date LIMIT 1 ";
$resultt= $conn->query($sqll);
// Récupération des réservations
$sql = "SELECT * FROM reservations";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chef Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
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
     <!-- Statistics Section -->
     <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
      <div class="bg-white p-6 rounded-lg shadow-md flex justify-between items-center">
        <div>
          <h3 class="text-gray-600">Pending reservations</h3>
          <p class="text-2xl font-bold text-blue-500">12</p>
        </div>
        <i class="fas fa-clock text-4xl text-blue-400"></i>
      </div>
      <div class="bg-white p-6 rounded-lg shadow-md flex justify-between items-center">
        <div>
          <p class="text-gray-600">Approved reservations</p>
          <h3 class="text-2xl font-bold text-green-500">34</h3>
        </div>
        <i class="fas fa-check-circle text-4xl text-green-400"></i>
      </div>
      
      <div class="bg-white p-6 rounded-lg shadow-md flex justify-between items-center">
        <div>
          <p class="text-gray-600">Total reservations</p>
          <h3 class="text-2xl font-bold text-yellow-500">8</h3>
        </div>
        <i class="fas fa-calendar-day text-4xl text-yellow-400"></i>
      </div>
    </div>


    <div class="bg-white p-6 rounded-lg shadow-md flex justify-between items-center">
        <div>
          <p class="text-gray-600">Prochaine reservation</p>
          <?php if ($resultt->num_rows > 0) : ?>
          <?php while ($row = $resultt->fetch_assoc()) : ?>
          
          <?php echo $row['name']; ?>
          <?php echo $row['date']; ?>
          <?php endwhile; ?>
          <?php else : ?>
            <?php echo "take a rest"; ?>    
           <?php endif; ?>
        </div>
        <i class="fas fa-calendar-day text-4xl text-yellow-400"></i>
      </div>

    <main class="container mx-auto p-4">
        <?php if (isset($message)) : ?>
            <div class="bg-green-200 text-green-700 p-4 rounded mb-4">
                <?php echo $message; ?>
            </div>
        <?php endif; ?>
        

        <!-- Reservations Section -->
        <h2 class="text-xl font-bold mb-4">View Reservations</h2>
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <table class="min-w-full bg-white">
                <thead>
                    <tr>
                        <th class="py-2 px-4 text-left">ID</th>
                        <th class="py-2 px-4 text-left">Client ID</th>
                        <th class="py-2 px-4 text-left">Date</th>
                        <th class="py-2 px-4 text-left">Time</th>
                        <th class="py-2 px-4 text-left">Status</th>
                        <th class="py-2 px-4 text-left">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($result->num_rows > 0) : ?>
                        <?php while ($row = $result->fetch_assoc()) : ?>
                            <tr class="border-t">
                                <td class="py-2 px-4"><?php echo $row['id']; ?></td>
                                <td class="py-2 px-4"><?php echo $row['client_id']; ?></td>
                                <td class="py-2 px-4"><?php echo $row['date']; ?></td>
                                <td class="py-2 px-4"><?php echo $row['time']; ?></td>
                                <td class="py-2 px-4 text-yellow-500"><?php echo $row['status']; ?></td>
                                <td class="py-2 px-4">
                                    <form method="POST" style="display: inline;">
                                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                        <button type="submit" name="action" value="approve" class="text-green-500 hover:underline">Approve</button>
                                    </form>
                                    |
                                    <form method="POST" style="display: inline;">
                                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                        <button type="submit" name="action" value="decline" class="text-red-500 hover:underline">Decline</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    <?php else : ?>
                        <tr class="border-t">
                            <td colspan="6" class="py-2 px-4 text-center">No reservations found</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white text-center p-4">
        <p>&copy; 2024 Chef's Gastronomic Experience. All rights reserved.</p>
    </footer>
</body>
</html>