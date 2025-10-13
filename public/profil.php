<?php
include "../config/connection.php";
session_start();

// pastikan user sudah login
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$id = $_SESSION['user_id'];
$result = mysqli_query($conn, "SELECT * FROM user WHERE id_user='$id'");
$data = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/1df42cf205.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        .fade-in {
            animation: fadeIn 0.3s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .no-scrollbar::-webkit-scrollbar {
            display: none;
        }

        .no-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
    </style>
</head>

<body class="bg-[#f9fafb] min-h-screen">

    <section class="max-w-7xl mx-auto min-h-screen bg-gray-50">
        <div class="flex flex-col-reverse lg:flex-row min-h-screen">

            <!-- Sidebar -->
            <aside class="w-full lg:w-1/4 bg-gray-50 border-r border-gray-200 p-6">
                <button
                   onclick="window.location.href='index.php'"
                    class="mb-6 flex items-center space-x-2 text-gray-700 hover:text-green-600 transition font-medium">
                    <i class="fa-solid fa-arrow-left"></i>
                    <span>Kembali</span>
                </button>
                <h2 class="text-2xl font-bold mb-6 text-gray-800">Pengaturan Akun</h2>
                <ul class="space-y-3">
                    <li>
                        <button id="btn-account-info"
                            class="w-full text-left px-5 py-3 rounded-xl bg-green-600 text-white font-medium flex items-center space-x-3 shadow hover:shadow-md transition"
                            onclick="switchSection('account-info', this)">
                            <i class="fa-solid fa-user text-lg"></i><span>Account Info</span>
                        </button>
                    </li>
                    <li>
                        <button id="btn-pengaturan-akun"
                            class="w-full text-left px-5 py-3 rounded-xl bg-white border border-gray-300 text-gray-700 font-medium flex items-center space-x-3 hover:bg-gray-100 transition"
                            onclick="switchSection('pengaturan-akun', this)">
                            <i class="fa-solid fa-user-gear text-lg"></i><span>Pengaturan Akun</span>
                        </button>
                    </li>
                </ul>
            </aside>

            <!-- Main Content -->
            <main id="content-area" class="flex-1 p-8 bg-white min-h-screen">
                <div id="account-info" class="fade-in">
                    <h3 class="text-2xl font-bold mb-4 text-gray-800">Account Info</h3>
                    <p class="text-gray-600 mb-6">Lihat dan lihat riwayat transaksi anda.</p>

                    <!-- Profil -->
                    <div class="flex items-center space-x-5 mb-8 bg-gray-50 p-5 rounded-xl">
                        <img src="../uploads/<?php echo $data['foto'] ?: 'default.png'; ?>"
                            alt="Foto Profil" class="w-20 h-20 rounded-full object-cover ring-2 ring-green-300">
                        <div>
                            <h4 class="text-lg font-semibold text-gray-900">
                                <?php echo htmlspecialchars($data['nama']); ?>
                            </h4>
                            <div class="flex-col gap-10">
                                <p class="text-gray-400 text-xs">ID Akun : <?php echo htmlspecialchars($data['id_user'] ?? 'N/A'); ?></p>
                                <p class="text-gray-500 text-sm">Email : <?php echo htmlspecialchars($data['email']); ?></p>
                                <p class="text-gray-500 text-sm">Alamat : <?php echo htmlspecialchars($data['alamat']); ?></p>
                            </div>
                        </div>
                    </div>

                    <!-- riwayat transaksi -->
                    <div class="space-y-4 mb-10">
                        <h4 class="text-lg font-semibold text-gray-800 mb-3">Riwayat Transaksi </h4>
                        <div class="space-y-4 max-h-[500px] overflow-y-auto fade-in">
                            <div
                                class="border border-gray-200 rounded-xl p-4 flex justify-between items-center hover:shadow-md transition bg-gray-50">
                                <div>
                                    <h4 class="font-semibold text-gray-900">Pembelian Beras Premium</h4>
                                    <p class="text-gray-500 text-sm">12 Oktober 2023 | Rp 150.000</p>
                                </div>
                                <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm font-medium">Selesai</span>
                            </div>
                            <div
                                class="border border-gray-200 rounded-xl p-4 flex justify-between items-center hover:shadow-md transition bg-gray-50">
                                <div>
                                    <h4 class="font-semibold text-gray-900">Pembelian Beras Organik</h4>
                                    <p class="text-gray-500 text-sm">9 Oktober 2023 | Rp 120.000</p>
                                </div>
                                <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-sm font-medium">Diproses</span>
                            </div>
                            <div
                                class="border border-gray-200 rounded-xl p-4 flex justify-between items-center hover:shadow-md transition bg-gray-50">
                                <div>
                                    <h4 class="font-semibold text-gray-900">Pembelian Beras Merah</h4>
                                    <p class="text-gray-500 text-sm">5 Oktober 2023 | Rp 100.000</p>
                                </div>
                                <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-sm font-medium">Dikirim</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="pengaturan-akun" class="hidden fade-in">
                    <div>
                        <!-- Header Section -->
                        <div class="mb-8">
                            <h3 class="text-2xl font-bold mb-4 text-gray-800">Pengaturan Akun</h3>
                            <p class="text-gray-600">Kelola informasi profil, keamanan, dan preferensi akun Anda dengan aman dan efisien.</p>
                        </div>

                        <!-- Profile Section -->
                        <div class="bg-white border border-gray-200 rounded-xl shadow-sm p-6 mb-8">
                            <h4 class="text-xl font-semibold mb-4 text-gray-900 flex items-center space-x-2">
                                <i class="fa-solid fa-user text-green-600"></i>
                                <span>Informasi Profil</span>
                            </h4>
                            <div class="flex items-center space-x-6">
                                <div class="relative">
                                    <img src="../uploads/<?php echo $data['foto'] ?: 'default.png'; ?>"
                                        alt="Foto Profil" class="w-24 h-24 rounded-full object-cover ring-2 ring-green-500/20">
                                    <button onclick="changeProfilePhoto()"
                                        class="absolute bottom-0 right-0 bg-green-600 text-white w-10 h-10 rounded-full shadow-sm hover:bg-green-700 transition flex items-center justify-center">
                                        <i class="fa-solid fa-camera text-sm"></i>
                                    </button>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <h5 class="text-lg font-semibold text-gray-900 truncate">
                                        <?php echo htmlspecialchars($data['nama']); ?>
                                    </h5>
                                    <div class="flex-col gap-10">
                                        <p class="text-gray-400 text-xs">ID Akun : <?php echo htmlspecialchars($data['id_user'] ?? 'N/A'); ?></p>
                                        <p class="text-gray-500 text-sm">Email : <?php echo htmlspecialchars($data['email']); ?></p>
                                        <p class="text-gray-500 text-sm">Alamat : <?php echo htmlspecialchars($data['alamat']); ?></p>
                                    </div>
                                </div>
                            </div>

                            <!-- Modal Ubah Foto -->
                            <div id="modalFoto" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50 p-4">
                                <div class="bg-white rounded-xl shadow-2xl w-full max-w-md">
                                    <div class="p-6">
                                        <h4 class="text-lg font-semibold mb-4 text-gray-900 flex items-center space-x-2">
                                            <i class="fa-solid fa-camera text-green-600"></i>
                                            <span>Ubah Foto Profil</span>
                                        </h4>
                                        <form action="../actions/update_foto.php" method="POST" enctype="multipart/form-data" class="space-y-4">
                                            <div class="border-2 border-dashed border-gray-300 rounded-lg p-4 text-center">
                                                <input type="file" name="foto" accept="image/*" id="fileInput" class="hidden" onchange="previewImage(event)">
                                                <label for="fileInput" class="cursor-pointer text-gray-500 hover:text-gray-700">
                                                    <i class="fa-solid fa-cloud-upload-alt text-2xl mb-2 block"></i>
                                                    <p class="text-sm">Klik untuk unggah foto baru (JPG, PNG, max 2MB)</p>
                                                </label>
                                                <img id="preview" class="mt-4 mx-auto w-32 h-32 rounded-full object-cover hidden" alt="Preview">
                                            </div>
                                            <div class="flex space-x-3 pt-2">
                                                <button type="submit" class="flex-1 bg-green-600 hover:bg-green-700 text-white py-2.5 rounded-lg font-medium transition">
                                                    <i class="fa-solid fa-check mr-2"></i>Simpan
                                                </button>
                                                <button type="button" onclick="closeModal()" class="flex-1 border border-gray-300 hover:bg-gray-50 text-gray-700 py-2.5 rounded-lg font-medium transition">Batal</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Form Utama (Wrapped in Form for Submission) -->
                        <form id="accountForm" action="../actions/update_account.php" method="POST" class="space-y-8">
                            <!-- Nama Section -->
                            <div class="bg-white border border-gray-200 rounded-xl shadow-sm p-6">
                                <h4 class="text-xl font-semibold mb-4 text-gray-900 flex items-center space-x-2">
                                    <i class="fa-solid fa-id-card text-green-600"></i>
                                    <span>Nama Lengkap</span>
                                </h4>
                                <div class="relative">
                                    <i class="fa-solid fa-user absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                                    <input type="text" name="nama" id="namaLengkap" value="<?php echo htmlspecialchars($data['nama'] ?? ''); ?>" required
                                        class="w-full pl-12 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 outline-none transition" placeholder="Masukkan nama lengkap Anda">
                                </div>
                                <p class="mt-1 text-sm text-gray-500">Gunakan nama asli untuk verifikasi identitas.</p>
                            </div>

                            <!-- Email Section -->
                            <div class="bg-white border border-gray-200 rounded-xl shadow-sm p-6">
                                <h4 class="text-xl font-semibold mb-4 text-gray-900 flex items-center space-x-2">
                                    <i class="fa-solid fa-envelope text-green-600"></i>
                                    <span>Alamat Email</span>
                                </h4>
                                <div class="relative">
                                    <i class="fa-solid fa-envelope absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                                    <input type="email" name="email" id="emailBaru" value="<?php echo htmlspecialchars($data['email'] ?? ''); ?>" required
                                        class="w-full pl-12 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 outline-none transition" placeholder="Masukkan alamat email baru">
                                </div>
                                <p class="mt-1 text-sm text-gray-500">Email akan diverifikasi melalui kode OTP.</p>
                            </div>

                            <!-- Alamat Section -->
                            <div class="bg-white border border-gray-200 rounded-xl shadow-sm p-6">
                                <h4 class="text-xl font-semibold mb-4 text-gray-900 flex items-center space-x-2">
                                    <i class="fa-solid fa-map-location-dot text-green-600"></i>
                                    <span>Alamat</span>
                                </h4>
                                <div class="relative">
                                    <i class="fa-solid fa-map-location-dot absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                                    <input type="text" name="alamat" id="alamatBaru" value="<?php echo htmlspecialchars($data['alamat'] ?? ''); ?>" required
                                        class="w-full pl-12 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 outline-none transition" placeholder="Masukkan alamat email baru">
                                </div>
                            </div>

                            <!-- Password Section -->
                            <div class="bg-white border border-gray-200 rounded-xl shadow-sm p-6">
                                <h4 class="text-xl font-semibold mb-4 text-gray-900 flex items-center space-x-2">
                                    <i class="fa-solid fa-lock text-green-600"></i>
                                    <span>Keamanan Kata Sandi</span>
                                </h4>
                                <div class="space-y-4">
                                    <div class="relative">
                                        <i class="fa-solid fa-lock absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                                        <input type="password" name="password_lama" id="passwordLama" required
                                            class="w-full pl-12 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 outline-none transition" placeholder="Kata sandi saat ini">
                                        <button type="button" onclick="togglePassword('passwordLama')" class="absolute right-4 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-gray-600">
                                            <i class="fa-solid fa-eye"></i>
                                        </button>
                                    </div>
                                    <div class="relative">
                                        <i class="fa-solid fa-lock absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                                        <input type="password" name="password_baru" id="passwordBaru" required
                                            class="w-full pl-12 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 outline-none transition" placeholder="Kata sandi baru (min. 8 karakter)">
                                        <button type="button" onclick="togglePassword('passwordBaru')" class="absolute right-4 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-gray-600">
                                            <i class="fa-solid fa-eye"></i>
                                        </button>
                                    </div>
                                    <div class="relative">
                                        <i class="fa-solid fa-lock absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                                        <input type="password" name="konfirmasi_password" id="konfirmasiPassword" required
                                            class="w-full pl-12 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 outline-none transition" placeholder="Konfirmasi kata sandi baru">
                                        <button type="button" onclick="togglePassword('konfirmasiPassword')" class="absolute right-4 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-gray-600">
                                            <i class="fa-solid fa-eye"></i>
                                        </button>
                                    </div>
                                </div>
                                <p class="mt-2 text-sm text-gray-500">Kata sandi harus mengandung huruf besar, kecil, angka, dan simbol untuk keamanan optimal.</p>
                            </div>

                            <!-- Tombol Simpan -->
                            <div class="flex justify-end">
                                <button type="submit" class="bg-green-600 hover:bg-green-700 text-white font-semibold px-8 py-3 rounded-lg transition flex items-center space-x-2 shadow-md">
                                    <i class="fa-solid fa-save"></i>
                                    <span>Simpan Perubahan</span>
                                </button>
                            </div>
                        </form>

                        <!-- Account Actions Section -->
                        <div class="bg-white border border-gray-200 rounded-xl shadow-sm p-6 mt-8">
                            <h4 class="text-xl font-semibold mb-4 text-gray-900 flex items-center space-x-2">
                                <i class="fa-solid fa-cog text-green-600"></i>
                                <span>Aksi Akun</span>
                            </h4>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <button type="button" onclick="logout()" class="border border-gray-300 hover:border-gray-400 bg-gray-50 hover:bg-gray-100 text-gray-700 font-medium px-6 py-3 rounded-lg transition flex items-center justify-center space-x-2">
                                    <i class="fa-solid fa-sign-out-alt"></i>
                                    <span>Keluar</span>
                                </button>
                                <button type="button" onclick="confirmDeleteAccount()" class="bg-red-50 hover:bg-red-100 border border-red-300 text-red-700 font-medium px-6 py-3 rounded-lg transition flex items-center justify-center space-x-2">
                                    <i class="fa-solid fa-trash"></i>
                                    <span>Hapus Akun</span>
                                </button>
                            </div>
                            <p class="mt-3 text-sm text-gray-500">Hapus akun akan menghapus semua data secara permanen. Pastikan Anda telah membackup informasi penting.</p>
                        </div>

                        <!-- Modal Konfirmasi logout Akun -->
                        <div id="modalLogout" class="fixed inset-0 bg-black bg-opacity-50 items-center justify-center z-50 p-4 hidden ">
                            <div class="bg-white rounded-xl shadow-2xl w-full max-w-md">
                                <div class="p-6">
                                    <h4 class="text-lg font-semibold mb-4 text-red-600 flex items-center space-x-2">
                                        <i class="fa-solid fa-exclamation-triangle"></i>
                                        <span>Konfirmasi Logout Akun</span>
                                    </h4>
                                    <p class="text-gray-700 mb-6">Apakah Anda yakin ingin logout dari akun ini?</p>
                                    <div class="flex space-x-3">
                                        <button type="button" onclick="logoutAkun()" class="flex-1 bg-red-600 hover:bg-red-700 text-white py-2.5 rounded-lg font-medium transition">Ya, Logout</button>
                                        <button type="button" onclick="closeLogoutModal()" class="flex-1 border border-gray-300 hover:bg-gray-50 text-gray-700 py-2.5 rounded-lg font-medium transition">Batal</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Modal Konfirmasi Hapus Akun -->
                        <div id="modalHapus" class="fixed inset-0 bg-black bg-opacity-50 items-center justify-center z-50 p-4 hidden ">
                            <div class="bg-white rounded-xl shadow-2xl w-full max-w-md">
                                <div class="p-6">
                                    <h4 class="text-lg font-semibold mb-4 text-red-600 flex items-center space-x-2">
                                        <i class="fa-solid fa-exclamation-triangle"></i>
                                        <span>Konfirmasi Hapus Akun</span>
                                    </h4>
                                    <p class="text-gray-700 mb-6">Apakah Anda yakin ingin menghapus akun ini? Tindakan ini tidak dapat dibatalkan dan semua data akan hilang.</p>
                                    <div class="flex space-x-3">
                                        <button type="button" onclick="hapusAkun()" class="flex-1 bg-red-600 hover:bg-red-700 text-white py-2.5 rounded-lg font-medium transition">Ya, Hapus</button>
                                        <button type="button" onclick="closeDeleteModal()" class="flex-1 border border-gray-300 hover:bg-gray-50 text-gray-700 py-2.5 rounded-lg font-medium transition">Batal</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </section>


    <script>
        // Fungsi toggle password visibility
        function togglePassword(id) {
            const input = document.getElementById(id);
            const icon = input.nextElementSibling.querySelector('i');
            if (input.type === 'password') {
                input.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                input.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        }

        function switchSection(sectionId, btn) {
            document.querySelectorAll("main > div").forEach(div => div.classList.add("hidden"));
            document.getElementById(sectionId).classList.remove("hidden");

            document.querySelectorAll("aside ul button").forEach(b => {
                b.classList.remove("bg-green-600", "text-white", "shadow");
                b.classList.add("bg-white", "text-gray-700", "border", "border-gray-300");
            });

            btn.classList.remove("bg-white", "text-gray-700", "border", "border-gray-300");
            btn.classList.add("bg-green-600", "text-white", "shadow");
        }

        function changeProfilePhoto() {
            document.getElementById("modalFoto").classList.remove("hidden");
            document.getElementById("modalFoto").classList.add("flex");
        }

        function closeModal() {
            document.getElementById("modalFoto").classList.add("hidden");
            document.getElementById("modalFoto").classList.remove("flex");
        }

        // logout

        function logout() {
            document.getElementById('modalLogout').classList.remove('hidden');
            document.getElementById('modalLogout').classList.add('flex');
        }

        function closeLogoutModal() {
            // tutup modal konfirmasi hapus
            document.getElementById('modalLogout').classList.add('hidden');
            document.getElementById('modalLogout').classList.remove('flex');
        }

        function logoutAkun() {
            // arahkan ke file aksi hapus akun
            window.location.href = "../actions/logout.php";
        }

        function confirmDeleteAccount() {
            // buka modal konfirmasi hapus
            document.getElementById('modalHapus').classList.remove('hidden');
            document.getElementById('modalHapus').classList.add('flex');
        }

        function closeDeleteModal() {
            // tutup modal konfirmasi hapus
            document.getElementById('modalHapus').classList.add('hidden');
            document.getElementById('modalHapus').classList.remove('flex');
        }

        function hapusAkun() {
            // arahkan ke file aksi hapus akun
            window.location.href = "../actions/delete_account.php";
        }
    </script>

</body>

</html>