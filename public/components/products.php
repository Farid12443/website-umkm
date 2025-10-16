<?php

include "../config/connection.php";

// Ambil semua produk dari database
$query = "SELECT * FROM produk ORDER BY created_at DESC";
$result = mysqli_query($conn, $query);

// ubah jadi array assosiatif
$products = mysqli_fetch_all($result, MYSQLI_ASSOC);

?>

<section class="max-w-7xl mx-auto" id="products-section">
    <div class="flex flex-col justify-between px-6 py-8 md:px-32 rounded-2xl">
        <!-- Header -->
        <div class="flex flex-col justify-between items-center gap-6 max-w-[600px] mx-auto text-center py-12">
            <h1 class="text-4xl md:text-5xl font-bold text-black">
                Lihat Produk Kami
            </h1>
            <p class="text-lg md:text-xl font-light text-black">
                Pilihan beras premium yang baru dipanen dan diproses dengan teliti. Nikmati kualitas terbaik untuk keluarga Anda.
            </p>
        </div>

        <!-- Filter & Search -->
        <div class="flex flex-col-reverse gap-4 md:flex-row md:items-center md:justify-between">
            <!-- Filter Buttons -->
            <div class="flex flex-wrap gap-3 justify-center md:justify-start">
                <button class="px-6 py-2 rounded-full border border-gray-300 text-white bg-green-500 shadow-lg transition-all duration-300 ease-in-out">
                    Semua produk
                </button>
                <button class="px-6 py-2 rounded-full border border-gray-300 text-gray-700 bg-white hover:bg-gray-100 hover:shadow-md transition-all duration-300 ease-in-out">
                    Premium
                </button>
                <button class="px-6 py-2 rounded-full border border-gray-300 text-gray-700 bg-white hover:bg-gray-100 hover:shadow-md transition-all duration-300 ease-in-out">
                    Organik
                </button>
                <button class="px-6 py-2 rounded-full border border-gray-300 text-gray-700 bg-white hover:bg-gray-100 hover:shadow-md transition-all duration-300 ease-in-out">
                    Murah
                </button>
            </div>

            <!-- Search Bar -->
            <div class="flex items-center w-full md:max-w-md border border-gray-300 rounded-full overflow-hidden shadow-sm focus-within:ring-2 focus-within:ring-green-400 transition">
                <input
                    type="text"
                    placeholder="Cari beras pilihan..."
                    class="flex-grow px-5 py-2 text-gray-700 placeholder-gray-400 focus:outline-none" />
                <button class="px-5 text-gray-600 hover:text-green-600 transition">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </button>
            </div>
        </div>

        <!-- Produk List -->
        <div class="flex overflow-x-auto space-x-6 snap-x snap-mandatory scrollbar-hide sm:grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 sm:gap-8 sm:space-x-0 py-8">
            <?php foreach ($products as $item) { ?>
                <div class="min-w-[230px] sm:min-w-0 snap-center rounded-xl bg-white shadow-md hover:shadow-xl transform transition-all duration-300 ease-in-out hover:-translate-y-1">
                    <img src="../uploads/<?php echo $item['foto'] ?>"
                        alt="<?php echo htmlspecialchars($item['nama_produk']) ?>"
                        class="w-full h-56 object-cover rounded-t-xl">

                    <div class="flex flex-col justify-between p-4">
                        <h1 class="text-lg font-semibold text-gray-800 mt-2 truncate">
                            <?php echo htmlspecialchars($item['nama_produk']) ?>
                        </h1>
                        <span class="text-sm text-gray-500 font-bold mb-2">
                            <?php echo htmlspecialchars($item['kategori']) ?>
                        </span>

                        <div class="flex justify-between items-center w-full mt-2">
                            <div class="flex flex-col">
                                <span class="text-green-600 text-sm">Harga</span>
                                <span class="text-green-600 font-bold text-lg">
                                    Rp<?php echo number_format($item['harga'], 0, ',', '.') ?>
                                </span>
                            </div>
                            <div class="flex flex-col text-end">
                                <span class="text-green-600 text-sm">Stok</span>
                                <span class="text-green-600 font-bold text-lg">
                                    <?php echo $item['stok'] ?>
                                </span>
                            </div>
                        </div>
                        <form action="../actions/tambah_keranjang.php" method="POST" class="flex">
                            <form action="../actions/tambah_keranjang.php" method="POST" class="flex">
                                <input type="hidden" name="id_produk" value="<?php echo $item['id_produk']; ?>">
                                <button type="submit" class="bg-green-500 hover:bg-green-600 text-white p-2 rounded-lg transition mt-3">
                                    <i class="fa-solid fa-cart-plus"></i> Tambah
                                </button>
                            </form>
                        </form>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>

</section>