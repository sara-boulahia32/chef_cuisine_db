<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] != 'admin') {
    header("Location: login.php");
    exit();
}

include 'db_config.php';

$sql = "SELECT * FROM plates";
$result = $conn->query($sql);

if (isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    // $menu_id = $_POST['menu_id'];

    // $sql = "INSERT INTO plates (name, description, price, menu_id) VALUES ('$name', '$description', '$price', '$menu_id')";
    $sql = "INSERT INTO plates (name, description, price) VALUES ('$name', '$description', '$price')";
    

    if ($conn->query($sql) === TRUE) {
        echo '<script type="text/javascript">
        
                if (window.history.replaceState) {
                    window.history.replaceState(null, null, window.location.href);
                }
            </script>';
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}




?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PLATES</title>
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
          <a href="index.php?view=dashboard" class="block py-2 px-4 text-gray-400 hover:bg-gray-700 hover:text-white">Dashboard</a>
          <a href="index.php?view=dashboard_newusers" class="block py-2 px-4 text-gray-400 hover:bg-gray-700 hover:text-white">New Users</a>
          <a href="index.php?view=dashboard_user-management" class="block py-2 px-4 text-gray-400 hover:bg-gray-700 hover:text-white">User Management</a>
          <a href="index.php?view=dashboard_archive" class="block py-2 px-4 text-gray-400 hover:bg-gray-700 hover:text-white">Archived Users</a>
      </nav>
  </aside>
  
      <!-- Main Content -->
      <main class="flex-1 overflow-y-auto m-12">
        <!-- Welcome Section -->
    <div class="bg-white p-6 rounded-lg shadow-md mb-6 flex justify-between items-center">
      <div>
        <h2 class="text-3xl font-semibold text-gray-800">Welcome, Sara!</h2>
        <p class="text-gray-600 mt-2">Here is your management dashbord</p> 
      </div>
      <div>
        <img src="https://via.placeholder.com/120" alt="chef icon" class="w-32">
      </div>
    </div>

    
          <!-- User Management Section -->
          <section id="user-management" >
              <h2 class="text-3xl font-bold mb-6">View plates</h2>
              <button id="editUserForm"  class="text-black flex justify-start content-center mt-3 hover:text-black"><a href="#" class="bg-white border border-black  w-32 h-10 flex items-center justify-center">Add plate </a> </button>
              <div class="bg-white rounded-lg shadow-md overflow-hidden">

              <table class="min-w-full bg-white">
              <thead>
        <tr class="border-t">
            <th class="py-2 px-4 text-left">ID</th>
            <th class="py-2 px-4 text-left">Name</th>
            <th class="py-2 px-4 text-left">Description</th>
            <th class="py-2 px-4 text-left">Price</th>
            <th class="py-2 px-4 text-left">Menu ID</th>
            <th class="py-2 px-4 text-left">Actions</th>
        </tr>
        </thead>
        <tbody id="tableBody">
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo '<tr class="border-t">';
                echo '<td class="py-2 px-4">' . $row['id'] . "</td>";
                echo '<td class="py-2 px-4">' . $row['name'] . "</td>";
                echo '<td class="py-2 px-4">' . $row['description'] . "</td>";
                echo '<td class="py-2 px-4">' . $row['price'] . "</td>";
                // echo "<td>" . $row['menu_id'] . "</td>";
                echo '<td class="py-2 px-4"><button id="submitEdituser" type="submit" class="text-black flex justify-start content-center mt-3 hover:text-black">
                <a class="text-green-500 hover:underline" href="edit_client.php?id=' . $row['id'] . '">Edit</a> | 
                <a  class="text-red-500 hover:underline" href="delete_plate.php?id=' . $row['id'] . '">Delete</a>
                <button id="deleteUserForm" value="'.$row['id'].'" 
    class="text-black flex justify-start content-center mt-3 hover:text-black bg-white border border-black w-32 h-10 flex items-center justify-center">
    Add Plate
</button>

                </td>';
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='6'>No plates found</td></tr>";
        }
        ?>

</tbody>

    </table>


  <div id="editForm" class="fixed hidden inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center">
    
      <div class="bg-gray-800 p-8 rounded-lg w-full max-w-md">
          <h2 class="text-2xl font-bold mb-6 text-white">Add plate</h2>
          <form method="post" action="view_plates.php">
              <input type="hidden" name="editId" id="editId">
              <div class="mb-4">
                  <label for="editName" class="block text-sm font-medium text-gray-400 mb-2">Name</label>
                  <input type="text" id="editName" name="name" class="input-field" required>
              </div>
              <div class="mb-4">
                  <label for="editEmail" class="block text-sm font-medium text-gray-400 mb-2">Descrption</label>
                  <input type="text" id="editEmail" name="description" class="input-field" required>
              </div>
              <div class="mb-4">
                  <label for="password" class="block text-sm font-medium text-gray-400 mb-2">Price</label>
                  <input type="number" id="password" name="price" class="input-field" required>
              </div>
              <div class="mb-6">
                  <label for="editRole" class="block text-sm font-medium text-gray-400 mb-2">Menu</label>
                  <select id="editRole" name="editRole" class="input-field">
                      <option value="customer">-----</option>
                      <option value="artist">--------</option>
                      <option value="admin">----------</option>
                  </select>
              </div>
              <div class="flex justify-end">
                  <button id="closeEdit" type="button" class="text-black flex justify-start content-center mt-3 hover:text-black"><a href="#" class="bg-white border border-black  w-32 h-10 flex items-center justify-center">
                    CANCEL
                </a></button>
                <input type="submit" value="Add Plate" class="text-black flex justify-start content-center mt-3 hover:text-black bg-white border border-black  w-32 h-10 flex items-center justify-center">
                  
              </div>
          </form>
      </div>
  

    

    <!-- Footer -->
   
   
  </div> </main>
  </div>
  <footer class="bg-gray-800 text-white text-center p-4">
        <p>&copy; 2024 Chef's Gastronomic Experience. All rights reserved.</p>
    </footer>
<script src="popuppp.js"></script>
</body>
</html>
