<?php session_start(); 
if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] != 'admin') { 
  header("Location: login.php"); exit(); } 
  // echo "Welcome to the Admin Dashboard!"; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chef Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <!-- Navbar -->
  <nav class="bg-black shadow-md p-4 flex justify-between items-center">
    <div class="flex items-center"><a href="#">
                <img src="img/cuisine_logo-removebg-preview.png" class="max-w-full h-auto w-[100px] " alt="logo">
            </a>
    <h1 class="text-2xl font-bold text-white"> Dashboard panel</h1></div>
    <div class="flex items-center">
      <span class="mr-4 text-white">Hello, <strong>Chef Sara</strong></span>
      <img src="https://via.placeholder.com/40" alt="profile" class="rounded-full w-10 h-10">
    </div>
  </nav>
  

    
<div class="flex h-screen">
  <!-- Sidebar -->
  <aside class="w-64 bg-gray-800">
      
      <nav class="mt-8">
          <a href="view_clients.php" class="block py-2 px-4 text-gray-400 hover:bg-gray-700 hover:text-white">View Clients</a>
          <a href="edit_client.php" class="block py-2 px-4 text-gray-400 hover:bg-gray-700 hover:text-white">Edit Client</a>
          <a href="delete_client.php" class="block py-2 px-4 text-gray-400 hover:bg-gray-700 hover:text-white">Remove Client</a>
          <a href="approve_reservation.php" class="block py-2 px-4 text-gray-400 hover:bg-gray-700 hover:text-white">Approve/Decline Reservation</a>
          <a href="add_plate.php" class="block py-2 px-4 text-gray-400 hover:bg-gray-700 hover:text-white">Add Plate to Menu</a>
          <a href="modify_plate.php" class="block py-2 px-4 text-gray-400 hover:bg-gray-700 hover:text-white">Modify Plate</a>
          <a href="delete_plate.php" class="block py-2 px-4 text-gray-400 hover:bg-gray-700 hover:text-white">Delete Plate</a>
          <a href="logout.php" class="block py-2 px-4 text-gray-400 hover:bg-gray-700 hover:text-white">Logout</a>
      </nav>
  </aside>
  <main class="flex-1  overflow-y-auto">
    <div class="container mx-auto p-4">
        <!-- Welcome Section -->
    <div class="bg-white p-6 rounded-lg shadow-md mb-6 flex justify-between items-center">
      <div>
        <h2 class="text-3xl font-semibold text-gray-800">Welcome, Sara!</h2>
        <p class="text-gray-600 mt-2">Here is the history of today's reservations</p>
      </div>
      <div>
        <img src="https://via.placeholder.com/120" alt="chef icon" class="w-32">
      </div>
    </div>
     <!-- Statistics Section -->
     <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
      <div class="bg-white p-6 rounded-lg shadow-md flex justify-between items-center">
        <div>
          <h3 class="text-gray-600">Pending Requests</h3>
          <p class="text-2xl font-bold text-blue-500">12</p>
        </div>
        <i class="fas fa-clock text-4xl text-blue-400"></i>
      </div>
      <div class="bg-white p-6 rounded-lg shadow-md flex justify-between items-center">
        <div>
          <p class="text-gray-600">Approved Today</p>
          <h3 class="text-2xl font-bold text-green-500">34</h3>
        </div>
        <i class="fas fa-check-circle text-4xl text-green-400"></i>
      </div>
      <div class="bg-white p-6 rounded-lg shadow-md flex justify-between items-center">
        <div>
          <p class="text-gray-600">Approved Tomorrow</p>
          <h3 class="text-2xl font-bold text-yellow-500">8</h3>
        </div>
        <i class="fas fa-calendar-day text-4xl text-yellow-400"></i>
      </div>
      <div class="bg-white p-6 rounded-lg shadow-md flex justify-between items-center">
        <div>
          <p class="text-gray-600">Total Clients</p>
          <h3 class="text-2xl font-bold text-yellow-500">8</h3>
        </div>
        <i class="fas fa-calendar-day text-4xl text-yellow-400"></i>
      </div>
    </div>
        
        <!-- Reservations Section -->
        <section class="mb-8">
            <h2 class="text-xl font-bold mb-4">Manage Reservations</h2>
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <table class="min-w-full bg-white">
                    <thead >
                        <tr>
                            <th class="py-2 px-4 text-left">Client</th>
                            <th class="py-2 px-4 text-left">Date</th>
                            <th class="py-2 px-4 text-left">Time</th>
                            <th class="py-2 px-4 text-left">Guests</th>
                            <th class="py-2 px-4 text-left">Status</th>
                            <th class="py-2 px-4 text-left">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        <tr class="border-t">
                            <td class="py-2 px-4">Asma lachhab</td>
                            <td class="py-2 px-4">2024-12-17</td>
                            <td class="py-2 px-4">19:00</td>
                            <td class="py-2 px-4">4</td>
                            <td class="py-2 px-4 text-yellow-500">Pending</td>
                            <td class="border-b p-3">
              <button class="text-green-500 hover:underline">Accept</button> | 
              <button class="text-red-500 hover:underline">Refuse</button>
            </td>
                        </tr>
                        
                        <tr class="border-t">
                            <td class="py-2 px-4">Sara boulahia</td>
                            <td class="py-2 px-4">2024-12-18td>
                            <td class="py-2 px-4">15:00</td>
                            <td class="py-2 px-4">6</td>
                            <td class="py-2 px-4 text-yellow-500">Pending</td>
                            <td class="border-b p-3">
              <button class="text-green-500 hover:underline">Accept</button> | 
              <button class="text-red-500 hover:underline">Refuse</button>
            </td>
                        </tr>
                        <tr class="border-t">
                            <td class="py-2 px-4">Sara boulahia</td>
                            <td class="py-2 px-4">2024-12-18td>
                            <td class="py-2 px-4">15:00</td>
                            <td class="py-2 px-4">6</td>
                            <td class="py-2 px-4 text-yellow-500">Pending</td>
                            <td class="border-b p-3">
              <button class="text-green-500 hover:underline">Accept</button> | 
              <button class="text-red-500 hover:underline">Refuse</button>
            </td>
                        </tr>

                        <tr class="border-t">
                            <td class="py-2 px-4">Sara boulahia</td>
                            <td class="py-2 px-4">2024-12-18td>
                            <td class="py-2 px-4">15:00</td>
                            <td class="py-2 px-4">6</td>
                            <td class="py-2 px-4 text-yellow-500">Pending</td>
                            <td class="border-b p-3">
              <button class="text-green-500 hover:underline">Accept</button> | 
              <button class="text-red-500 hover:underline">Refuse</button>
            </td>
                        </tr>

                        <tr class="border-t">
                            <td class="py-2 px-4">Sara boulahia</td>
                            <td class="py-2 px-4">2024-12-18td>
                            <td class="py-2 px-4">15:00</td>
                            <td class="py-2 px-4">6</td>
                            <td class="py-2 px-4 text-yellow-500">Pending</td>
                            <td class="border-b p-3">
              <button class="text-green-500 hover:underline">Accept</button> | 
              <button class="text-red-500 hover:underline">Refuse</button>
            </td>
                        </tr>                    </tbody>
                </table>
            </div>
        </section>

        <!-- Profile Section -->
        <!-- <section class="mb-8">
            <h2 class="text-xl font-bold mb-4">Profile</h2>
            <div class="bg-white rounded-lg shadow-md p-6">
                <form>
                    <div class="mb-4">
                        <label for="name" class="block text-sm font-bold mb-2">Name</label>
                        <input type="text" id="name" name="name" class="w-full px-3 py-2 border rounded-md" value="Chef's Name" required>
                    </div>
                    <div class="mb-4">
                        <label for="email" class="block text-sm font-bold mb-2">Email</label>
                        <input type="email" id="email" name="email" class="w-full px-3 py-2 border rounded-md" value="chef@example.com" required>
                    </div>
                    <div class="mb-4">
                        <label for="password" class="block text-sm font-bold mb-2">Password</label>
                        <input type="password" id="password" name="password" class="w-full px-3 py-2 border rounded-md" required>
                    </div>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Update Profile</button>
                </form>
            </div>
        </section> -->

        <!-- Add Menu Section -->
        <section class="mb-8">
            <button id="open-menu-form" class="bg-orange-950 text-white px-4 py-2 rounded-md">Add Menu</button>
            <div id="menu-form-container" class="mt-4 hidden">
                <div class="max-w-lg mx-auto bg-white rounded-lg shadow-md overflow-hidden">
                    <div class="p-4">
                        <h2 class="text-xl font-bold mb-4">New Menu</h2>
                        <form id="menu-form" action="" method="POST">
                            <div class="mb-4">
                                <label for="menu-name" class="block text-sm font-bold mb-2">Menu Name</label>
                                <input type="text" id="menu-name" name="menu-name" class="w-full px-3 py-2 border rounded-md" required>
                            </div>
                            <div class="mb-4">
                                <label for="menu-price" class="block text-sm font-bold mb-2">Price</label>
                                <input type="number" step="0.01" id="menu-price" name="menu-price" class="w-full px-3 py-2 border rounded-md" required>
                            </div>
                            <div class="mb-4">
                                <label for="menu-description" class="block text-sm font-bold mb-2">Description</label>
                                <textarea id="menu-description" name="menu-description" class="w-full px-3 py-2 border rounded-md" required></textarea>
                            </div>

                            <!-- Dishes Section -->
                            <div id="dishes-section">
                                <h3 class="text-lg font-bold mb-2">Dishes</h3>
                                <div class="dish-field mb-4">
                                    <label for="dish-name-1" class="block text-sm font-bold mb-2">Dish Name</label>
                                    <input type="text" id="dish-name-1" name="dish-name[]" class="w-full px-3 py-2 border rounded-md mb-2" required>
                                    <label for="dish-image-1" class="block text-sm font-bold mb-2">Dish Image URL</label>
                                    <input type="text" id="dish-image-1" name="dish-image[]" class="w-full px-3 py-2 border rounded-md mb-2" required>
                                    <button type="button" class="remove-dish bg-red-500 text-white px-2 py-1 rounded-md">Remove</button>
                                </div>
                            </div>

                            <button type="button" id="add-dish" class="bg-blue-500 text-white px-4 py-2 rounded-md mb-4">Add Dish</button>

                            <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded-md">Save Menu</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>

    

    <!-- Footer -->
    <footer class="bg-gray-800 text-white text-center p-4">
        <p>&copy; 2024 Chef's Gastronomic Experience. All rights reserved.</p>
    </footer>
    </main>
<script src="popup.js"></script>
</body>
</html>