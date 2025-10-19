<?php
session_start();
include "../config/connection.php";

// Pastikan user login
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$id_user = $_SESSION['user_id'];

// Ambil data keranjang + produk
$query = "
    SELECT k.*, p.nama_produk, p.harga, p.foto, p.kategori
    FROM keranjang k
    JOIN produk p ON k.id_produk = p.id_produk
    WHERE k.id_user = '$id_user'
";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang Belanja</title>

    <!-- load tailwindcss -->
    <link rel="stylesheet" href="css/style.css">

    <!-- load fontawesome -->
    <script src="https://kit.fontawesome.com/1df42cf205.js" crossorigin="anonymous"></script>

    <!-- load google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant:ital,wght@0,300..700;1,300..700&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Marmelad&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>

<body class="bg-[#f9f9f9] font-[roboto]">
    <section class="max-w-7xl mx-auto px-8 py-8 md:px-32">
        <div class="flex items-center mb-6">
            <button onclick="history.back()"
                class="flex items-center text-gray-600 hover:text-green-600 transition">
                <i class="fa-solid fa-arrow-left mr-2"></i> Kembali
            </button>
        </div>
        <h1 class="text-3xl md:text-4xl font-bold text-gray-800 mb-8">Keranjang Belanja</h1>


        <?php if (mysqli_num_rows($result) == 0) { ?>
            <!-- Jika keranjang kosong -->
            <div class="flex flex-col items-center justify-center text-center py-10 rounded-xl">
                <img src="https://cdn-icons-png.flaticon.com/512/2038/2038854.png"
                    alt="Empty Cart" class="w-24 sm:w-32 mb-4 opacity-50 mx-auto">
                <h2 class="text-lg sm:text-xl font-semibold text-gray-700 mb-2">Keranjangmu masih kosong</h2>
                <p class="text-gray-500 mb-6 text-sm sm:text-base">Yuk, tambahkan produk favoritmu ke keranjang sekarang!</p>
                <a href="./index.php#products-section"
                    class="px-5 py-2.5 bg-green-600 hover:bg-green-700 text-white font-semibold rounded-lg transition">
                    Belanja Sekarang
                </a>
            </div>
        <?php } else { ?>

            <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">
                <!-- Daftar produk -->
                <div class="lg:col-span-2 space-y-4">
                    <?php
                    $total = 0;
                    while ($row = mysqli_fetch_assoc($result)) {
                        $subtotal = $row['harga'] * $row['jumlah'];
                        $total += $subtotal;
                    ?>
                        <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between bg-white rounded-xl shadow-sm p-4 hover:shadow-md transition">
                            <div class="flex flex-col sm:flex-row items-start sm:items-center space-y-2 sm:space-y-0 sm:space-x-4">
                                <img src="../uploads/<?php echo htmlspecialchars($row['foto']); ?>"
                                    class="w-20 h-20 rounded-lg object-cover" alt="produk">
                                <div>
                                    <h2 class="font-semibold text-gray-800 text-lg"><?php echo htmlspecialchars($row['nama_produk']); ?></h2>
                                    <p class="text-sm text-gray-500">Kategori: <?php echo htmlspecialchars($row['kategori']); ?></p>
                                </div>
                            </div>

                            <div class="flex flex-col sm:flex-row items-center sm:space-x-4 mt-3 sm:mt-0">
                                <!-- Counter -->
                                <div class="flex items-center border rounded-lg overflow-hidden" data-id="<?php echo $row['id_keranjang']; ?>">
                                    <button class="px-3 py-1 text-gray-600 hover:bg-gray-100"
                                        onclick="updateQty(this, -1, <?php echo $row['harga']; ?>)">−</button>
                                    <span class="px-4 font-medium text-gray-800 qty"><?php echo $row['jumlah']; ?></span>
                                    <button class="px-3 py-1 text-gray-600 hover:bg-gray-100"
                                        onclick="updateQty(this, 1, <?php echo $row['harga']; ?>)">+</button>
                                </div>


                                <!-- Subtotal -->
                                <p class="font-semibold text-gray-800 text-lg subtotal">Rp <?php echo number_format($subtotal, 0, ',', '.'); ?></p>

                                <!-- Tombol hapus -->
                                <form action="../actions/hapus_keranjang.php" method="POST">
                                    <input type="hidden" name="id_keranjang" value="<?php echo $row['id_keranjang']; ?>">
                                    <button type="submit" class="text-gray-400 hover:text-red-500">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    <?php } ?>

                    <!-- Tombol hapus semua -->
                    <div class="flex justify-end mt-6">
                        <form action="../actions/clear_keranjang.php" method="POST">
                            <button type="submit" class="px-4 py-2 rounded-lg bg-red-500 hover:bg-red-600 text-white font-semibold transition">
                                Batalkan Semua
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Ringkasan -->
                <div class="bg-white rounded-xl shadow-sm p-6 space-y-4">
                    <h2 class="font-semibold text-gray-800 text-lg">Ringkasan Pesanan</h2>
                    <div class="space-y-2 text-gray-600">
                        <div class="flex justify-between">
                            <span>Total Harga</span>
                            <span id="total-harga">Rp <?php echo number_format($total, 0, ',', '.'); ?></span>
                        </div>
                        <div class="flex justify-between">
                            <span>Ongkir</span>
                            <span>Rp 15.000</span>
                        </div>
                        <div class="border-t my-2"></div>
                        <div class="flex justify-between text-lg font-semibold text-gray-800">
                            <span>Total Bayar</span>
                            <span id="total-bayar">Rp <?php echo number_format($total + 15000, 0, ',', '.'); ?></span>
                        </div>
                    </div>
                    <button class="w-full py-3 bg-green-600 hover:bg-green-700 text-white font-semibold rounded-lg transition">
                        Checkout Sekarang
                    </button>
                </div>
            </div>
        <?php } ?>
    </section>

    <script>
        function updateQty(btn, delta, harga) {
            const container = btn.parentElement;
            const idKeranjang = container.dataset.id;
            const qtyEl = container.querySelector(".qty");

            // Cari subtotal dengan lebih tepat — ambil parent produk card
            const productCard = btn.closest(".flex.flex-col.sm\\:flex-row");
            const subtotalEl = productCard.querySelector(".subtotal");

            const totalHargaEl = document.getElementById("total-harga");
            const totalBayarEl = document.getElementById("total-bayar");

            let qty = parseInt(qtyEl.textContent);
            qty = Math.max(1, qty + delta);
            qtyEl.textContent = qty;

            // Kirim ke server via AJAX
            fetch("../actions/update_jumlah.php", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/x-www-form-urlencoded"
                    },
                    body: `id_keranjang=${idKeranjang}&jumlah=${qty}`
                })
                .then(res => res.json())
                .then(data => {
                    if (data.status === "success") {
                        // Hitung ulang subtotal
                        const subtotal = harga * qty;
                        subtotalEl.textContent = "Rp " + subtotal.toLocaleString("id-ID");

                        // Hitung ulang total semua item
                        let total = 0;
                        document.querySelectorAll(".subtotal").forEach(sub => {
                            total += parseInt(sub.textContent.replace(/\D/g, ""));
                        });

                        totalHargaEl.textContent = "Rp " + total.toLocaleString("id-ID");
                        totalBayarEl.textContent = "Rp " + (total + 15000).toLocaleString("id-ID");
                    } else {
                        alert("Gagal memperbarui jumlah: " + data.message);
                    }
                })
                .catch(err => alert("Terjadi kesalahan koneksi ke server"));
        }
    </script>


</body>

</html>