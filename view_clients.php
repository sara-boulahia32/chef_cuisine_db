<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] != 'admin') {
    header("Location: login.php");
    exit();
}

include 'db_config.php';

// Gérer les actions (ajout, édition, suppression)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['action'])) {
        if ($_POST['action'] == 'add') {
            // Ajout d'un client
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT); 
            $role = 'client';

            $sql = "INSERT INTO users (name, email, password, role) VALUES ('$name', '$email', '$password', '$role')";
            if ($conn->query($sql) === TRUE) {
                echo "Client ajouté avec succès.";
            } else {
                echo "Erreur : " . $conn->error;
            }
        } elseif ($_POST['action'] == 'edit') {
            // Modification d'un client
            $id = $_POST['id'];
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

            $sql = "UPDATE users SET name='$name', email='$email', password='$password' WHERE id=$id";
            if ($conn->query($sql) === TRUE) {
                echo "Client modifié avec succès.";
            } else {
                echo "Erreur : " . $conn->error;
            }
        }
    }
} elseif (isset($_GET['action']) && $_GET['action'] == 'delete') {
    // Suppression d'un client
    $id = $_GET['id'];
    $sql = "DELETE FROM users WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        echo "Client supprimé avec succès.";
    } else {
        echo "Erreur : " . $conn->error;
    }
}

// Récupération des utilisateurs
$sql = "SELECT * FROM users WHERE role='client'";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clients Management</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

<!-- Navbar -->
<nav class="bg-black shadow-md p-4 flex justify-between items-center">
    <h1 class="text-2xl font-bold text-white">Dashboard Panel</h1>
    <span class="mr-4 text-white">Hello, <strong>Admin</strong></span>
</nav>

<div class="flex h-screen">
    <!-- Sidebar -->
    <aside class="w-64 bg-gray-800">
        <nav class="mt-8">
            <a href="#" class="block py-2 px-4 text-gray-400 hover:bg-gray-700 hover:text-white">Dashboard</a>
            <a href="logout.php" class="block py-2 px-4 text-gray-400 hover:bg-gray-700 hover:text-white">Logout</a>
        </nav>
    </aside>

    <main class="flex-1 overflow-y-auto p-6">
        <h2 class="text-2xl font-bold mb-6">Clients Management</h2>

        <!-- Tableau des clients -->
        <table class="table-auto w-full bg-white shadow rounded">
            <thead>
                <tr>
                    <th class="px-4 py-2">ID</th>
                    <th class="px-4 py-2">Name</th>
                    <th class="px-4 py-2">Email</th>
                    <th class="px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr class='border-t'>";
                        echo "<td class='px-4 py-2'>{$row['id']}</td>";
                        echo "<td class='px-4 py-2'>{$row['name']}</td>";
                        echo "<td class='px-4 py-2'>{$row['email']}</td>";
                        echo "<td class='px-4 py-2'>
                                <button onclick='editClient({$row['id']}, \"{$row['name']}\", \"{$row['email']}\")' class='text-blue-500 hover:underline'>Edit</button>
                                |
                                <a href='view_clients.php?action=delete&id={$row['id']}' class='text-red-500 hover:underline'>Delete</a>
                              </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='4' class='text-center py-4'>No clients found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </main>
</div>

<!-- Modale pour formulaire -->
<div id="editModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
    <div class="bg-white rounded-lg shadow-lg w-1/3 p-6 relative">
        <button onclick="closeModal()" class="absolute top-2 right-2 text-gray-500">&times;</button>
        <h2 id="modalTitle" class="text-xl font-bold mb-4">Edit Client</h2>
        <form method="post" action="view_clients.php">
            <input type="hidden" name="action" id="formAction" value="add">
            <input type="hidden" name="id" id="editId">

            <div class="mb-4">
                <label for="name" class="block text-gray-700">Name</label>
                <input type="text" id="name" name="name" class="w-full border px-2 py-1" required>
            </div>
            <div class="mb-4">
                <label for="email" class="block text-gray-700">Email</label>
                <input type="email" id="email" name="email" class="w-full border px-2 py-1" required>
            </div>
            <div class="mb-4">
                <label for="password" class="block text-gray-700">Password</label>
                <input type="password" id="password" name="password" class="w-full border px-2 py-1" required>
            </div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Save</button>
        </form>
    </div>
</div>
 <!-- Footer -->
 <footer class="bg-gray-800 text-white text-center p-4">
        <p>&copy; 2024 Chef's Gastronomic Experience. All rights reserved.</p>
    </footer>

<script>
    function editClient(id, name, email) {
        // Remplir les champs du formulaire pour modification
        document.getElementById('formAction').value = 'edit';
        document.getElementById('editId').value = id;
        document.getElementById('name').value = name;
        document.getElementById('email').value = email;
        openModal();
    }

    function openModal() {
        document.getElementById('editModal').classList.remove('hidden');
    }

    function closeModal() {
        document.getElementById('editModal').classList.add('hidden');
    }
</script>

</body>
</html>
