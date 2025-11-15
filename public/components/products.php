<?php

include "../config/connection.php";

$query = "SELECT * FROM produk WHERE status = 'active' ORDER BY created_at DESC";

$result = mysqli_query($conn, $query);

$products = mysqli_fetch_all($result, MYSQLI_ASSOC);

?>

<section class="max-w-7xl mx-auto" id="products-section">
    <div class="flex flex-col justify-between px-6 py-8 md:px-32 rounded-2xl">
        
        <div class="flex flex-col justify-between items-center gap-6 max-w-[600px] mx-auto text-center py-12">
            <h1 class="text-4xl md:text-5xl font-bold text-black">
                Lihat Produk Kami
            </h1>
            <p class="text-lg md:text-xl font-light text-black">
                Pilihan beras premium yang baru dipanen dan diproses dengan teliti. Nikmati kualitas terbaik untuk keluarga Anda.
            </p>
        </div>

        <div class="flex flex-col-reverse gap-4 md:flex-row md:items-center md:justify-between">
            <div class="flex flex-wrap gap-3 justify-center md:justify-start">
                <button data-category="Semua" class="px-6 py-2 rounded-full border border-gray-300 text-white bg-[#FFB200] shadow-lg">Semua produk</button>
                <button data-category="Premium" class="px-6 py-2 rounded-full border border-gray-300 text-white bg-[#FFB200] hover:shadow-lg">Premium</button>
                <button data-category="Organik" class="px-6 py-2 rounded-full border border-gray-300 text-white bg-[#FFB200] hover:shadow-lg">Organik</button>
                <button data-category="Murah" class="px-6 py-2 rounded-full border border-gray-300 text-white bg-[#FFB200] hover:shadow-lg">Murah</button>
            </div>

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

        <?php if (count($products) > 0): ?>
            <div class="flex overflow-x-auto space-x-6 snap-x snap-mandatory scrollbar-hide sm:grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 sm:gap-8 sm:space-x-0 py-8">
                <?php foreach ($products as $item): ?>
                    <div
                        class="product-card min-w-[300px] sm:min-w-0 snap-center rounded-xl bg-white shadow-md hover:shadow-xl transform transition-all duration-300 ease-in-out hover:-translate-y-1 min-h-[400px] flex flex-col"
                        data-category="<?php echo htmlspecialchars($item['kategori']); ?>">
                        <img src="../uploads/<?php echo $item['foto'] ?>"
                            alt="<?php echo htmlspecialchars($item['nama_produk']) ?>"
                            class="w-full h-48 object-cover rounded-t-xl">

                        <div class="flex flex-col justify-between p-4 flex-grow">
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

                            <form action="../actions/tambah_keranjang.php" method="POST" class="mt-auto">
                                <input type="hidden" name="id_produk" value="<?php echo $item['id_produk']; ?>">
                                <button type="submit" class="bg-[#FFB200] hover:bg-green-600 text-white p-2 rounded-lg transition w-full">
                                    <i class="fa-solid fa-cart-plus"></i> Tambah
                                </button>
                            </form>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <div class="w-full flex mt-12 flex-col justify-center items-center text-center py-20">
                <h2 class="text-2xl font-semibold text-gray-700">Belum ada produk yang ditambahkan</h2>
                <p class="text-gray-500 mt-2">Coba hubungi admin untuk info lebih lanjut.</p>
            </div>
        <?php endif; ?>
    </div>
</section>

<script>
    document.addEventListener("DOMContentLoaded", () => {
        const buttons = document.querySelectorAll("button[data-category]");
        const products = document.querySelectorAll(".product-card");
        const searchInput = document.querySelector('input[type="text"]');
        const searchButton = document.querySelector('button i.fa-magnifying-glass').parentElement;
        const productSection = document.getElementById("products-section");

       
        if (products.length === 0) {
            emptyMessage.style.display = "none";
            return;
        }


        let currentCategory = "Semua";

        //  Pesan produk tidak ditemukan
        const emptyMessage = document.createElement("div");
        emptyMessage.className = "w-full flex  flex-col justify-center items-center text-center py-20";
        emptyMessage.innerHTML = `
            <h2 class="text-2xl font-semibold text-gray-700">Produk tidak ditemukan</h2>
            <p class="text-gray-500 mt-2">Coba kategori atau kata kunci lain.</p>
        `;
        emptyMessage.style.display = "none";
        productSection.appendChild(emptyMessage);

        function filterProducts(category, searchTerm = "") {
            currentCategory = category;
            let visibleCount = 0;

            buttons.forEach(b => b.classList.remove("bg-[#FFB200]", "text-white"));
            const activeButton = Array.from(buttons).find(b => b.dataset.category === category);
            if (activeButton) activeButton.classList.add("bg-[#FFB200]", "text-white");

            products.forEach(product => {
                const productCategory = product.dataset.category.toLowerCase();
                const productName = product.querySelector("h1").textContent.toLowerCase();

                const matchesCategory = (category === "Semua" || productCategory === category.toLowerCase());
                const matchesSearch = productName.includes(searchTerm.toLowerCase());

                if (matchesCategory && matchesSearch) {
                    product.style.display = "flex";
                    visibleCount++;
                } else {
                    product.style.display = "none";
                }
            });

            emptyMessage.style.display = visibleCount === 0 ? "flex" : "none";
        }

        filterProducts("Semua");

        buttons.forEach(btn => {
            btn.addEventListener("click", () => {
                filterProducts(btn.dataset.category, searchInput.value);
            });
        });

        searchButton.addEventListener("click", () => {
            filterProducts(currentCategory, searchInput.value);
        });

        searchInput.addEventListener("input", () => {
            filterProducts(currentCategory, searchInput.value);
        });
    });
</script>
