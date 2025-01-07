<?php
include 'db_config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['email']) && isset($_POST['password'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM users WHERE email='$email'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            if (password_verify($password, $row['password'])) { 
                session_start();
                $_SESSION['user_id'] = $row['id'];
                $_SESSION['user_role'] = $row['role'];

              
                if ($row['role'] == 'admin') {
                    header("Location: admin_dashboard.php");
                } else {
                    header("Location: user_dashboard.php");
                }
                exit();
            } else {
                echo "Invalid password." . "<br>";
            }
        } else {
            echo "No user found with that email." . "<br>";
        }
    } else {
        echo "Please enter both email and password." . "<br>";
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login Form</title>
  <!-- Font Awesome CDN link for icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex flex-col items-center justify-center min-h-screen  p-4 overflow-hidden">
  <div class="max-w-md w-full bg-white rounded-lg shadow-md">
    <div class="h-28 bg-gray-800 text-white text-2xl font-semibold flex items-center justify-center rounded-t-lg">
      <span>Login Form</span>
    </div>
    <form method="post" action="login.php" class="p-6">
      <div class="relative h-14 mb-4">
     
        <i class="fas fa-user absolute top-0 left-0 w-14 h-full bg-black text-white text-xl flex items-center justify-center rounded-l-lg"></i>
        <input type="email" name="email" placeholder="Email or Phone" required 
               class="w-full h-full pl-16 border border-gray-300 rounded-r-lg text-lg focus:border-gray-800 focus:ring-gray-800 transition">
      </div>
      <div class="relative h-14 mb-4">
        <i class="fas fa-lock absolute top-0 left-0 w-14 h-full bg-black text-white text-xl flex items-center justify-center rounded-l-lg"></i>
        <input type="password" name="password" placeholder="Password" required 
               class="w-full h-full pl-16 border border-gray-300 rounded-r-lg text-lg focus:border-gray-800 focus:ring-gray-800 transition">
      </div>
      <div class="text-right mb-4">
        <a href="#" class="text-black text-sm hover:underline">Forgot password?</a>
      </div>
      <div>
        <input type="submit" value="Login" 
               class="w-full h-14 bg-gray-800 text-white text-lg font-medium rounded-lg cursor-pointer hover:bg-white hover:text-black hover:border-2 hover:border-black transition">
      </div>
      <div class="text-center mt-6 text-sm">
        Not a member? <a href="signin.php" class="text-gray-800 hover:underline">Signup now</a>
      </div>
    </form>
  </div>
</body>
</html>
