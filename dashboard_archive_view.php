<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <script src="https://cdn.tailwindcss.com"></script>

</head>
<body>
  
  
  <div class="bg-gray-100">
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
        <p class="text-gray-600 mt-2">Here are the new users!</p> 
      </div>
      <div>
        <img src="https://via.placeholder.com/120" alt="chef icon" class="w-32">
      </div>
    </div>
  
          <!-- User Management Section -->
          <section id="user-management" >
              <h2 class="text-3xl font-bold mb-6">Archived Users</h2>
              <div class="bg-white rounded-lg shadow-md overflow-hidden">
                  <table class="min-w-full bg-white">
                      <thead>
                          <tr >
                              <th class="py-2 px-4 text-left">Name</th>
                              <th class="py-2 px-4 text-left">Email</th>
                              <th class="py-2 px-4 text-left">Archived Date</th>
                              <th class="py-2 px-4 text-left">Action</th>
                          </tr>
                      </thead>
                      <tbody id="tableBody">
                          <tr class="border-t">
                              <td class="py-2 px-4">Jane Smith</td>
                              <td class="py-2 px-4">jane@example.com</td>
                              <td class="py-2 px-4">2023-05-15</td>
                              <td class="border-b p-3">
              <button class="text-yellow-600 hover:underline">Restore</button> 
            </td>
                          </tr>
                          <!-- Add more rows as needed -->
                      </tbody>
                  </table>
              </div>
          </section>
      </main>
  </div>
  
  </div>
  
  <script type="module" src="./dist/dashboard_users.js"></script>


<script type="module" src="./dist/dashboard_stats.js"></script>
</body>
</html>