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
                <h2 class="text-2xl font-bold mb-6 text-gray-800">Pengaturan Akun</h2>
                <ul class="space-y-3">
                    <li>
                        <button id="btn-account-info"
                            class="w-full text-left px-5 py-3 rounded-xl bg-green-600 text-white font-medium flex items-center space-x-3 shadow hover:shadow-md transition"
                            onclick="switchSection('account-info', this)">
                            <i class="fa-solid fa-user-gear text-lg"></i><span>Account Info</span>
                        </button>
                    </li>
                    <li>
                        <button id="btn-riwayat"
                            class="w-full text-left px-5 py-3 rounded-xl bg-white border border-gray-300 text-gray-700 font-medium flex items-center space-x-3 hover:bg-gray-100 transition"
                            onclick="switchSection('riwayat-transaksi', this)">
                            <i class="fa-solid fa-clock-rotate-left text-lg"></i><span>Riwayat Transaksi</span>
                        </button>
                    </li>
                </ul>
            </aside>

            <!-- Main Content -->
            <main id="content-area" class="flex-1 p-8 bg-white min-h-screen">
                <div id="account-info" class="fade-in">
                    <h3 class="text-2xl font-bold mb-4 text-gray-800">Account Info</h3>
                    <p class="text-gray-600 mb-6">Kelola dan perbarui detail akun, foto profil, dan kata sandi Anda.</p>



                    <!-- Profil -->
                    <div class="flex items-center space-x-5 mb-8 bg-gray-50 p-5 rounded-xl">
                        <img src="https://via.placeholder.com/90" alt="Profile Picture"
                            class="w-20 h-20 rounded-full object-cover ring-2 ring-green-300">
                        <div>
                            <h4 class="text-lg font-semibold text-gray-900">Muhammad Farid Islamudin</h4>
                            <p class="text-gray-500 text-sm">faridislamudin@example.com</p>
                            <button class="text-green-600 font-medium mt-1 hover:underline flex items-center space-x-1"
                                onclick="changeProfilePhoto()">
                                <i class="fa-solid fa-camera"></i><span>Ubah Foto</span>
                            </button>
                        </div>
                    </div>

                    <!-- Ganti Password -->
                    <div class="space-y-4 mb-10">
                        <h4 class="text-lg font-semibold text-gray-800 mb-3">Setel Ulang Kata Sandi</h4>
                        <div>
                            <label class="block text-gray-700 font-medium mb-2">Kata Sandi Baru</label>
                            <div class="relative">
                                <i
                                    class="fa-solid fa-lock absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                                <input type="password" id="newPassword" placeholder="Masukkan kata sandi baru"
                                    class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent outline-none">
                            </div>
                        </div>
                        <div>
                            <label class="block text-gray-700 font-medium mb-2">Konfirmasi Kata Sandi</label>
                            <div class="relative">
                                <i
                                    class="fa-solid fa-lock absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                                <input type="password" id="confirmPassword" placeholder="Ulangi kata sandi baru"
                                    class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent outline-none">
                            </div>
                            <p id="passwordMatch" class="text-sm mt-1 hidden"></p>
                        </div>
                        <button
                            class="w-full bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-lg font-medium transition"
                            onclick="setPassword()">Setel Kata Sandi</button>
                    </div>

                    <!-- Aksi Akun -->
                    <div class="border-t border-gray-200 pt-6">
                        <h4 class="text-lg font-semibold mb-4 text-gray-800">Akun</h4>
                        <div class="flex gap-3">
                            <button
                                class="flex-1 border border-gray-300 px-4 py-3 rounded-lg font-medium hover:bg-gray-100 transition flex items-center justify-center space-x-2"
                                onclick="logout()">
                                <i class="fa-solid fa-sign-out-alt"></i><span>Logout</span>
                            </button>
                            <button
                                class="flex-1 bg-red-500 hover:bg-red-600 text-white px-4 py-3 rounded-lg font-medium transition flex items-center justify-center space-x-2"
                                onclick="deleteAccount()">
                                <i class="fa-solid fa-trash"></i><span>Hapus Akun</span>
                            </button>
                        </div>
                    </div>


                </div>

                <div id="riwayat-transaksi" class="hidden">
                    <h3 class="text-2xl font-bold mb-4 text-gray-800 fade-in">Riwayat Transaksi</h3>
                    <!-- daftar transaksi -->
                    <div class="space-y-4 max-h-[500px] overflow-y-auto pr-2 fade-in">
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
            </main>
        </div>
    </section>


    <script>
        function switchSection(sectionId, btn) {
            document.querySelectorAll("main > div").forEach(div => div.classList.add("hidden"));
            document.getElementById(sectionId).classList.remove("hidden");

            document.querySelectorAll("aside button").forEach(b => {
                b.classList.remove("bg-green-600", "text-white", "shadow");
                b.classList.add("bg-white", "text-gray-700", "border", "border-gray-300");
            });

            btn.classList.remove("bg-white", "text-gray-700", "border", "border-gray-300");
            btn.classList.add("bg-green-600", "text-white", "shadow");
        }
    </script>

</body>

</html>