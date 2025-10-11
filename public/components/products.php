<?php
$products = [
    ['image' => 'images/ad.png', 'productName' => 'Beras Premium 1', 'price' => 20000, 'stock' => 99],
    ['image' => 'images/ad.png', 'productName' => 'Beras Premium 2', 'price' => 20000, 'stock' => 99],
    ['image' => 'images/ad.png', 'productName' => 'Beras Premium 3', 'price' => 200000, 'stock' => 99],
    ['image' => 'images/ad.png', 'productName' => 'Beras Premium 4', 'price' => 20000, 'stock' => 99],
    ['image' => 'images/ad.png', 'productName' => 'Beras Premium 5', 'price' => 20000, 'stock' => 99],
    ['image' => 'images/ad.png', 'productName' => 'Beras Premium 6', 'price' => 20000, 'stock' => 99],
    ['image' => 'images/ad.png', 'productName' => 'Beras Premium 7', 'price' => 20000, 'stock' => 99],
    ['image' => 'images/ad.png', 'productName' => 'Beras Premium 7', 'price' => 20000, 'stock' => 99],
    ['image' => 'images/ad.png', 'productName' => 'Beras Premium 8', 'price' => 20000, 'stock' => 99]
];
?>

<section class="max-w-7xl mx-auto" id="products-section">
    <div class="flex flex-col md:flex-col justify-between px-8 py-8 md:px-32 rounded-2xl">
        <div class="flex flex-col justify-between items-center gap-8 max-w-[600px] mx-auto text-center py-12">
            <h1 class="text-5xl font-bold text-black">
                Lihat Produk Kami
            </h1>
            <p class="text-xl font-light text-black">
                Pilihan beras premium yang baru dipanen dan diproses dengan teliti. Nikmati kualitas terbaik untuk keluarga Anda.
            </p>
        </div>

        <div class="flex flex-col-reverse justify-between md:flex-row">
            <!-- Filter Buttons -->
            <div class="flex flex-wrap gap-3">
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


            <div class="flex items-center w-full max-w-md border border-gray-300 rounded-full overflow-hidden shadow-sm focus-within:ring-2 focus-within:ring-green-400 transition">
                <input
                    type="text"
                    placeholder="Cari beras pilihan..."
                    class="flex-grow px-5 py-2 text-gray-700 placeholder-gray-400 focus:outline-none" />
                <button class="px-5 text-gray-600 hover:text-green-600 transition">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </button>
            </div>

        </div>



        <div class="flex flex-wrap justify-center md:justify-between gap-8 pt-8">
            <?php foreach ($products as $item) { ?>
                <div class="rounded-xl p-6 bg-white shadow-md hover:shadow-xl transform transition-all duration-300 ease-in-out hover:-translate-y-1">
                    <div class="flex flex-col justify-between p-2">
                        <img src="<?php echo $item['image'] ?>" alt="" class="w-60 h-60 object-contain">

                        <h1 class="text-lg font-semibold text-gray-800">
                            <?php echo $item['productName'] ?>
                        </h1>
                        <div class="flex justify-between items-center w-full mt-2">
                            <div class="flex flex-col">
                                <span class="text-green-600 font-sm text-md">
                                    Harga
                                </span>
                                <span class="text-green-600 font-bold text-lg">
                                    Rp<?php echo number_format($item['price'], 0, ',', '.') ?>
                                </span>
                            </div>
                            <div class="flex flex-col text-end">
                                <span class="text-green-600 font-sm text-md">
                                    Stok
                                </span>
                                <span class="text-green-600 font-bold text-lg">
                                    <?php echo ($item['stock']) ?>
                                </span>
                            </div>
                        </div>
                        <button class="bg-green-500 hover:bg-green-600 text-white p-2 rounded-lg transition mt-2">
                            <i class="fa-solid fa-cart-plus"></i>
                            Tambah
                        </button>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>