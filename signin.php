<?php include 'db_config.php'; 
if ($_SERVER["REQUEST_METHOD"] == "POST") { 
  $name = $_POST['name']; 
  $email = $_POST['email']; 
  $password = password_hash($_POST['password'], PASSWORD_DEFAULT); 
  $role = 'client'; 
  $sql = "INSERT INTO users (name, email, password, role) VALUES ('$name', '$email', '$password', '$role')"; 
  if ($conn->query($sql) === TRUE) { 
    echo "Signup successful. You can now <a href='login.php'>login</a>."; } 
 else { 
  echo "Error: " . $sql . "<br>" . $conn->error; } $conn->close(); }?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Responsive Login Form Tailwind CSS</title>
  <!-- Font Awesome CDN link for icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex flex-col items-center justify-center min-h-screen  p-4 overflow-hidden">
  <div class="max-w-md w-full bg-white rounded-lg shadow-md">
    <div class="h-28 bg-gray-800 text-white text-2xl font-semibold flex items-center justify-center rounded-t-lg">
      <span>Signin form</span>
    </div>
    <form method="post" action="signin.php" class="p-6">
      <div class="relative h-14 mb-4">
      <!-- <label for="name">Name:</label> -->

        <i class="fas fa-user absolute top-0 left-0 w-14 h-full bg-black text-white text-xl flex items-center justify-center rounded-l-lg"></i>
        <input type="text" id="name" name="name" placeholder="Name.." required 
               class="w-full h-full pl-16 border border-gray-300 rounded-r-lg text-lg focus:border-black focus:ring-black transition">
      </div>
      <div class="relative h-14 mb-4">
      <!-- <label for="email">Email:</label> -->

        <i class="fas fa-user absolute top-0 left-0 w-14 h-full bg-black text-white text-xl flex items-center justify-center rounded-l-lg"></i>
        <input type="email" id="email" name="email" placeholder="Email or Phone" required 
               class="w-full h-full pl-16 border border-gray-300 rounded-r-lg text-lg focus:border-black focus:ring-black transition">
      </div>
      <div class="relative h-14 mb-4">
      <!-- <label for="password">Password:</label> -->
        <i class="fas fa-lock absolute top-0 left-0 w-14 h-full bg-black text-white text-xl flex items-center justify-center rounded-l-lg"></i>
        <input type="password" id="password" name="password" placeholder="Create password" required 
               class="w-full h-full pl-16 border border-gray-300 rounded-r-lg text-lg focus:border-black focus:ring-black transition">
      </div>
      <div class="relative h-14 mb-4">
      <!-- <label for="confirmpassword">Email:</label> -->
        <i class="fas fa-lock absolute top-0 left-0 w-14 h-full bg-black text-white text-xl flex items-center justify-center rounded-l-lg"></i>
        <input type="password" id="confirmpassword" placeholder="Confirm password" required 
               class="w-full h-full pl-16 border border-gray-300 rounded-r-lg text-lg focus:border-black focus:ring-black transition">
      </div>
      <div>
        <input type="submit" value="Signin" 
               class="w-full h-14 bg-gray-800 text-white text-lg font-medium rounded-lg cursor-pointer hover:bg-white transition hover:text-black hover:border-2 hover:border-black">
      </div>
      <div class="text-center mt-6 text-sm">
        Already have an account? <a href="login.php" class="text-gray-800 hover:underline">Login</a>
      </div>
    </form>
  </div>
</body>
</html>
