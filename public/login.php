<?php
include "../config/connection.php";
session_start(); 

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // cek email
    $query = "SELECT * FROM user WHERE email = '$email'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);

        // cek password
        if (password_verify($password, $user['kata_sandi'])) {

            
            $_SESSION['user_id'] = $user['id_user']; 
            $_SESSION['nama'] = $user['nama'];
            $_SESSION['email'] = $user['email'];

            echo "<script>alert('Login berhasil! Selamat datang, " . $user['nama_lengkap'] . "'); window.location='index.php';</script>";
        } else {
            echo "<script>alert('Kata sandi salah!');</script>";
        }
    } else {
        echo "<script>alert('Email tidak ditemukan!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <!-- Tailwind CSS -->
    <link rel="stylesheet" href="css/style.css">

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/1df42cf205.js" crossorigin="anonymous"></script>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant:ital,wght@0,300..700;1,300..700&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Marmelad&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    <style>
        .no-scrollbar::-webkit-scrollbar {
            display: none;
        }

        .no-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
    </style>
</head>

<body class="font-[roboto]">
    <section class="max-w-7xl mx-auto">
        <div class="flex flex-col-reverse lg:flex-row justify-between items-center px-4 py-8 sm:px-8 md:px-16 lg:px-24 rounded-2xl">
            <div class="w-full lg:w-1/2 flex items-center justify-center p-6 lg:p-10 bg-white order-2 lg:order-1 min-h-[400px] lg:min-h-[600px]">
                <div class="relative w-full max-w-sm md:max-w-md lg:max-w-lg flex items-center justify-center">
                    <img
                        src="images/login-image.png"
                        alt="Ilustrasi Login"
                        class="w-full max-w-[600px] h-auto object-contain drop-shadow-xl" />
                </div>
            </div>

            <div class="w-full lg:w-1/2 flex flex-col justify-center px-4 sm:px-8 md:px-12 lg:px-16 py-6 order-1 lg:order-2 min-h-[400px] lg:min-h-[600px]">
                <div class="no-scrollbar max-w-sm mx-auto w-full bg-white p-6 rounded-2xl md:overflow-y-auto md:max-h-[500px]">
                    <h2 class="text-2xl font-bold text-gray-900 mb-2 text-center">Masuk ke Akun Anda</h2>
                    <p class="text-gray-600 mb-6 text-center">Silakan login menggunakan email dan kata sandi Anda.</p>

                    <form action="login.php" method="POST" class="space-y-4">
                        <div>
                            <label class="block text-gray-700 font-medium mb-1">Email</label>
                            <input type="email" name="email" class="w-full border-b-2 border-gray-300 focus:border-green-500 outline-none py-2 text-sm" placeholder="Masukkan email Anda" required>
                        </div>

                        <div>
                            <label class="block text-gray-700 font-medium mb-1">Kata Sandi</label>
                            <div class="flex items-center border-b-2 border-gray-300 focus-within:border-green-500">
                                <input type="password" name="password" class="w-full py-2 outline-none text-sm" placeholder="Masukkan kata sandi" required>
                                <button type="button" class="text-gray-400 hover:text-gray-600 p-1">
                                    <i class="fa fa-eye-slash"></i>
                                </button>
                            </div>
                        </div>

                        <div class="flex justify-between items-center text-sm mt-2">
                            <label class="flex items-center space-x-2">
                                <input type="checkbox" class="accent-green-600 w-4 h-4">
                                <span class="text-gray-700">Ingat saya</span>
                            </label>
                            <a href="#" class="text-green-600 hover:underline">Lupa kata sandi?</a>
                        </div>

                        <button type="submit" name="submit" class="w-full bg-green-600 text-white py-3 rounded-lg font-semibold hover:bg-green-700 transition mt-4 text-sm">
                            Masuk Sekarang
                        </button>

                        <p class="text-center text-gray-600 text-sm mt-4">
                            Belum punya akun?
                            <a href="register.php" class="text-green-600 font-medium hover:underline">Daftar di sini</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>

</html>