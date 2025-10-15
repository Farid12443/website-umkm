<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang Belanja</title>
    <!-- Load Tailwind CSS -->
    <link rel="stylesheet" href="css/style.css">

    <!-- Load FontAwesome -->
    <script src="https://kit.fontawesome.com/1df42cf205.js" crossorigin="anonymous"></script>

    <!-- Load Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant:ital,wght@0,300..700;1,300..700&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Marmelad&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

</head>

<body class="bg-[#f9f9f9] font-[roboto]">
    <!-- Container utama -->
    <section class="max-w-7xl mx-auto">
        <div class="px-8 py-8 md:px-32">
            <h1 class="text-2xl sm:text-3xl md:text-4xl font-bold text-gray-800 mb-4 sm:mb-6 md:mb-8">
                Keranjang Belanja
            </h1>

            <!-- Jika keranjang kosong -->
            <div id="empty-cart" class="hidden flex-col items-center justify-center text-center py-1 rounded-xl">
                <img src="https://cdn-icons-png.flaticon.com/512/2038/2038854.png" alt="Empty Cart"
                    class="w-24 sm:w-32 mb-4 opacity-50 mx-auto">
                <h2 class="text-lg sm:text-xl font-semibold text-gray-700 mb-2">Keranjangmu masih kosong</h2>
                <p class="text-gray-500 mb-6 text-sm sm:text-base">Yuk, tambahkan produk favoritmu ke keranjang sekarang!</p>
                <a href="produk.php"
                    class="px-5 py-2.5 bg-green-600 hover:bg-green-700 text-white font-semibold rounded-lg transition">
                    Belanja Sekarang
                </a>
            </div>

            <!-- Jika ada produk -->
            <div id="cart-content" class="grid grid-cols-1 gap-4 sm:gap-6 md:gap-8 lg:grid-cols-3">
                <!-- Kiri: daftar produk -->
                <div class="lg:col-span-2 space-y-4 sm:space-y-5 md:space-y-6">
                    <!-- Produk item -->
                    <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between bg-white rounded-xl shadow-sm p-4 sm:p-5 hover:shadow-md transition">
                        <div class="flex flex-col sm:flex-row items-start sm:items-center space-y-2 sm:space-y-0 sm:space-x-4">
                            <img src="https://via.placeholder.com/90" class="w-16 sm:w-20 h-16 sm:h-20 rounded-lg object-cover" alt="produk">
                            <div>
                                <h2 class="font-semibold text-gray-800 text-base sm:text-lg">Beras Premium 5kg</h2>
                                <p class="text-sm text-gray-500">Varian: Super</p>
                            </div>
                        </div>
                        <div class="flex flex-col sm:flex-row items-start sm:items-center space-y-2 sm:space-y-0 sm:space-x-4 mt-2 sm:mt-0">
                            <div class="flex items-center border rounded-lg overflow-hidden w-full sm:w-auto">
                                <button class="px-2 sm:px-3 py-1 text-gray-600 hover:bg-gray-100" onclick="kurangi(this)">−</button>
                                <span class="px-3 sm:px-4">1</span>
                                <button class="px-2 sm:px-3 py-1 text-gray-600 hover:bg-gray-100" onclick="tambah(this)">+</button>
                            </div>
                            <p class="font-semibold text-gray-800 text-base sm:text-lg">Rp 75.000</p>
                            <button class="text-gray-400 hover:text-red-500"><i class="fa-solid fa-trash"></i></button>
                        </div>
                    </div>

                    <!-- Tombol bawah -->
                    <div class="flex flex-col sm:flex-row justify-between space-y-2 sm:space-y-0 sm:space-x-4 mt-4 sm:mt-6 md:mt-8 md:justify-end">
                        <button class="w-full sm:w-auto px-4 py-2 rounded-lg bg-red-500 hover:bg-red-600 text-white font-semibold transition">
                            Batalkan Pesanan
                        </button>
                    </div>
                </div>

                <!-- Kanan: Ringkasan + pembayaran -->
                <div class="space-y-4 sm:space-y-6">
                    <!-- Ringkasan Pesanan -->
                    <div class="bg-white rounded-xl shadow-sm p-4 sm:p-6">
                        <h2 class="font-semibold text-gray-800 mb-2 sm:mb-4 text-base sm:text-lg">Ringkasan Pesanan</h2>
                        <div class="space-y-2 text-gray-600">
                            <div class="flex justify-between"><span>Diskon</span><span>Rp 0</span></div>
                            <div class="flex justify-between"><span>Ongkir</span><span>Rp 15.000</span></div>
                            <div class="flex justify-between"><span>Pajak</span><span>Rp 10.000</span></div>
                            <div class="border-t my-1 sm:my-2"></div>
                            <div class="flex justify-between text-base sm:text-lg font-semibold text-gray-800">
                                <span>Total</span><span>Rp 205.000</span>
                            </div>
                        </div>
                    </div>

                    <!-- Metode Pembayaran -->
                    <div class="bg-white rounded-xl shadow-sm p-4 sm:p-6">
                        <h2 class="font-semibold text-gray-800 mb-2 sm:mb-4 text-base sm:text-lg">Metode Pembayaran</h2>
                        <div class="flex flex-wrap justify-start space-x-2 mb-2 sm:mb-4">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/3/39/PayPal_logo.svg" class="w-12 sm:w-16" alt="PayPal">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/0/04/Visa.svg" class="w-8 sm:w-12" alt="Visa">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/0/02/Mastercard-logo.svg" class="w-8 sm:w-12" alt="MasterCard">
                        </div>
                        <button class="w-full py-2 sm:py-3 bg-green-600 hover:bg-green-700 text-white font-semibold rounded-lg transition">
                            Checkout Sekarang
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        // Contoh logika JS untuk simulasi keranjang kosong
        const cartHasItems = true; // ubah ke false untuk test tampilan kosong
        if (!cartHasItems) {
            document.getElementById("cart-content").classList.add("hidden");
            document.getElementById("empty-cart").classList.remove("hidden");
        }
    </script>


    <script>
        function tambah(btn) {
            const span = btn.parentElement.querySelector("span");
            let val = parseInt(span.textContent);
            span.textContent = val + 1;
            // (Opsional: Tambahkan logika untuk update total harga di sini)
        }

        function kurangi(btn) {
            const span = btn.parentElement.querySelector("span");
            let val = parseInt(span.textContent);
            if (val > 1) span.textContent = val - 1;
            // (Opsional: Tambahkan logika untuk update total harga di sini)
        }
    </script>
</body>

</html>