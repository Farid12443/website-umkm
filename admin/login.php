<?php
include "../config/connection.php";
session_start();

$error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';

    if (empty($username) || empty($password)) {
        $error = 'Username dan Password harus diisi!';
    } else {
        $stmt = $conn->prepare("SELECT id_admin, username, password FROM admin WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            $admin = $result->fetch_assoc();

            if ($password === $admin['password'] && $username === $admin['username']) {
                $_SESSION['admin_id'] = $admin['id_admin'];
                $_SESSION['username'] = $admin['username'];

                header("Location: index.php");
                exit();
            } else {
                $error = 'Password salah';
            }
        } else {
            $error = 'Akun tidak ditemukan!';
        }
        $stmt->close();
    }
}
?>


<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Admin Panel</title>
   <!-- load tailwindcss -->
    <link rel="stylesheet" href="../public/css/style.css">
    <!-- load fontawesome -->
    <script src="https://kit.fontawesome.com/1df42cf205.js" crossorigin="anonymous"></script>

    <!-- load google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant:ital,wght@0,300..700;1,300..700&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Marmelad&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>

<body class="bg-gray-50">
    <div class="min-h-screen flex items-center justify-center py-12 px-4">
        <div class="w-full max-w-md bg-white rounded-lg shadow-md p-8">
            <h1 class="text-3xl font-bold text-center text-gray-900 mb-8">Login Seller</h1>

            <?php if ($error): ?>
                <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
                    <?php echo htmlspecialchars($error); ?>
                </div>
            <?php endif; ?>

            <form method="POST" class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Username</label>
                    <input type="text" name="username" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                    <input type="password" name="password" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                </div>

                <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded-lg font-medium hover:bg-blue-700 transition">Login</button>
            </form>
        </div>
    </div>
</body>

</html>