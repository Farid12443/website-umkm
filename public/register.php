<?php
include "../config/connection.php";

if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $alamat = $_POST['alamat'];
    $no_hp = $_POST['no_hp'];

    $query = "INSERT INTO user (nama_lengkap, email, kata_sandi, alamat, nomor_hp) 
              VALUES ('$nama', '$email', '$password', '$alamat', '$no_hp')";

    if (mysqli_query($conn, $query)) {
        // ambil user yang baru daftar
        $user_id = mysqli_insert_id($conn);

        // session
        session_start();
        $_SESSION['user_id'] = $user_id;
        $_SESSION['nama'] = $nama;
        $_SESSION['email'] = $email;

        echo "<script>
        alert('Registrasi berhasil! Selamat datang, $nama');
        window.location='index.php';
    </script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    // mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <!-- load tailwindcss -->
    <link rel="stylesheet" href="css/style.css">

    <!-- load fontawesome -->
    <script src="https://kit.fontawesome.com/1df42cf205.js" crossorigin="anonymous"></script>

    <!-- load google fonts -->
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
                        src="images/register-image.png"
                        alt="Ilustrasi Registrasi"
                        class="w-full max-w-[600px] h-auto object-contain drop-shadow-xl" />
                </div>
            </div>

            <div class="w-full lg:w-1/2 flex flex-col justify-center px-4 sm:px-8 md:px-12 lg:px-16 py-6 order-1 lg:order-2 min-h-[400px] lg:min-h-[600px]">
                <div class="no-scrollbar max-w-sm mx-auto w-full bg-white p-6 rounded-2xl md:overflow-y-auto md:max-h-[500px]">
                    <h2 class="text-2xl font-bold text-gray-900 mb-2 text-center">Daftar Akun Baru</h2>
                    <p class="text-gray-600 mb-6 text-center">Silakan isi data diri Anda dengan benar untuk melanjutkan.</p>

                    <form action="register.php" method="POST" class="space-y-4">
                        <div>
                            <label class="block text-gray-700 font-medium mb-1">Nama Lengkap</label>
                            <input type="text" name="nama" class="w-full border-b-2 border-gray-300 focus:border-green-500 outline-none py-2 text-sm" placeholder="Masukkan nama lengkap Anda" required>
                        </div>

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

                        <div>
                            <label class="block text-gray-700 font-medium mb-1">Konfirmasi Kata Sandi</label>
                            <div class="flex items-center border-b-2 border-gray-300 focus-within:border-green-500">
                                <input type="password" class="w-full py-2 outline-none text-sm" placeholder="Ulangi kata sandi" required>
                                <button type="button" class="text-gray-400 hover:text-gray-600 p-1">
                                    <i class="fa fa-eye-slash"></i>
                                </button>
                            </div>
                        </div>

                        <div>
                            <label class="block text-gray-700 font-medium mb-1">Nomor HP</label>
                            <input type="tel" name="no_hp" class="w-full border-b-2 border-gray-300 focus:border-green-500 outline-none py-2 text-sm" placeholder="Masukkan nomor HP Anda" required>
                        </div>

                        <div>
                            <label class="block text-gray-700 font-medium mb-1">Alamat</label>
                            <input type="text" name="alamat" class="w-full border-b-2 border-gray-300 focus:border-green-500 outline-none py-2 text-sm" placeholder="Masukkan alamat Anda" required>
                        </div>

                        <div class="flex items-start space-x-2 text-sm mt-2">
                            <input type="checkbox" class="accent-green-600 w-4 h-4 mt-1" required>
                            <span class="text-gray-700">Saya menyetujui <a href="#" class="text-green-600 hover:underline">Syarat & Ketentuan</a>.</span>
                        </div>

                        <button type="submit" name="submit" class="w-full bg-green-600 text-white py-3 rounded-lg font-semibold hover:bg-green-700 transition mt-4 text-sm">
                            Daftar Sekarang
                        </button>

                        <p class="text-center text-gray-600 text-sm mt-4">
                            Sudah punya akun?
                            <a href="./login.php" class="text-green-600 font-medium hover:underline">Masuk di sini</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>

</html>