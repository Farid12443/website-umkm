<?php
session_start();
include "../config/connection.php";

$show_success_modal = isset($_GET['success']) && $_GET['success'] == 1;

// Pastikan user login
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$id_user = $_SESSION['user_id'];

// Ambil data user
$query_user = mysqli_query($conn, "SELECT * FROM user WHERE id_user = '$id_user'");
$data_user = mysqli_fetch_assoc($query_user);


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
    <style>
        @keyframes checkmark {
            0% {
                stroke-dasharray: 0 30;
                stroke-dashoffset: 30;
            }

            100% {
                stroke-dasharray: 30 30;
                stroke-dashoffset: 0;
            }
        }

        .checkmark-path {
            stroke-dasharray: 30 30;
            stroke-dashoffset: 30;
            animation: checkmark 0.8s ease forwards;
        }

        @keyframes pop {
            0% {
                transform: scale(0);
            }

            60% {
                transform: scale(1.2);
            }

            100% {
                transform: scale(1);
            }
        }

        .animate-checkmark {
            animation: pop 0.5s ease-out;
        }
    </style>
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
            <!-- jika keranjang kosong -->
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

            <div id="cartContainer" class="grid grid-cols-1 gap-6 lg:grid-cols-3">
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
                                <div class="flex items-center border rounded-lg overflow-hidden" data-id="<?php echo $row['id_keranjang']; ?>">
                                    <button class="px-3 py-1 text-gray-600 hover:bg-gray-100"
                                        onclick="updateQty(this, -1, <?php echo $row['harga']; ?>)">−</button>
                                    <span class="px-4 font-medium text-gray-800 qty"><?php echo $row['jumlah']; ?></span>
                                    <button class="px-3 py-1 text-gray-600 hover:bg-gray-100"
                                        onclick="updateQty(this, 1, <?php echo $row['harga']; ?>)">+</button>

                                </div>
                                <p class="font-semibold text-gray-800 text-lg subtotal">Rp <?php echo number_format($subtotal, 0, ',', '.'); ?></p>

                                <form action="../actions/hapus_keranjang.php" method="POST">
                                    <input type="hidden" name="id_keranjang" value="<?php echo $row['id_keranjang']; ?>">
                                    <button type="submit" class="text-gray-400 hover:text-red-500">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    <?php } ?>

                    <div class="flex justify-end mt-6">
                        <form action="../actions/clear_keranjang.php" method="POST">
                            <button type="submit" class="px-4 py-2 rounded-lg bg-red-500 hover:bg-red-600 text-white font-semibold transition">
                                Batalkan Semua
                            </button>
                        </form>
                    </div>
                </div>

                <!-- ringkasan -->
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
                    <button id="checkoutBtn" class="w-full py-3 bg-green-600 hover:bg-green-700 text-white font-semibold rounded-lg transition">
                        Checkout Sekarang
                    </button>
                </div>

                <!-- modal checkout -->
                <div id="checkoutModal"
                    class="bg-black/10 backdrop-blur-lg fixed inset-0 hidden justify-center items-center z-50 transition-all duration-300 ease-in-out">

                    <div class="bg-white rounded-2xl shadow-xl w-full max-w-md p-6 relative transform scale-95 transition-transform duration-300">

                        <!-- tombol close -->
                        <button id="closeIcon" class="absolute top-4 right-4 text-gray-400 hover:text-gray-600 transition">
                            <i class="fa-solid fa-xmark text-xl"></i>
                        </button>

                        <h2 class="text-2xl font-bold mb-6 text-gray-800 text-center">
                            Konfirmasi Checkout
                        </h2>

                        <!-- pesan error -->
                        <?php if (isset($_GET['error'])): ?>
                            <div class="bg-red-100 border border-red-300 text-red-800 p-3 rounded-md mb-4 text-sm text-center">
                                <?php
                                if ($_GET['error'] == 'stok_habis') {
                                    echo "Maaf, stok produk \"" . htmlspecialchars($_GET['produk']) . "\" sudah habis.";
                                } elseif ($_GET['error'] == 'stok_kurang') {
                                    echo "Maaf, stok produk \"" . htmlspecialchars($_GET['produk']) . "\" tidak mencukupi.";
                                }
                                ?>
                            </div>
                        <?php endif; ?>

                        <!-- form checkout -->
                        <form action="../actions/proses_checkout.php" method="POST" class="space-y-5">

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
                                <input type="text" name="nama" id="nama"
                                    value="<?php echo htmlspecialchars($data_user['nama_lengkap']); ?>"
                                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-green-500 focus:border-green-500"
                                    required>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Alamat</label>
                                <input type="text" name="alamat" id="alamat"
                                    value="<?php echo htmlspecialchars($data_user['alamat']); ?>"
                                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-green-500 focus:border-green-500"
                                    required>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">No HP</label>
                                <input type="text" name="no_hp" id="no_hp"
                                    value="<?php echo htmlspecialchars($data_user['nomor_hp']); ?>"
                                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-green-500 focus:border-green-500"
                                    required>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Metode Pembayaran</label>
                                <select name="metode_pembayaran" id="metode_pembayaran"
                                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-green-500 focus:border-green-500">
                                    <option value="COD">COD (Bayar di Tempat)</option>
                                    <option value="Transfer Bank">Transfer Bank</option>
                                    <option value="E-Wallet">E-Wallet</option>
                                </select>
                            </div>

                            <div class="flex justify-end space-x-3 pt-4 border-t border-gray-100 mt-6">
                                <button type="button" id="closeModal"
                                    class="px-4 py-2 bg-gray-200 text-gray-800 font-medium rounded-lg hover:bg-gray-300 transition">
                                    Batal
                                </button>
                                <button type="submit" id="confirmCheckout"
                                    class="px-4 py-2 bg-green-600 text-white font-medium rounded-lg hover:bg-green-700 transition">
                                    Konfirmasi
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- modal sukses -->
                <div id="successModal" class="bg-black/10 backdrop-blur-lg fixed inset-0 hidden justify-center items-center z-50 transition-all duration-300 ease-in-out">
                    <div class="bg-white rounded-2xl shadow-xl w-full max-w-md p-6 text-center relative transform scale-95 transition-transform duration-300">
                        <div class="flex justify-center mb-4">
                            <div class="w-20 h-20 bg-green-100 rounded-full flex items-center justify-center relative overflow-hidden">
                                <svg
                                    class="w-10 h-10 text-green-600 animate-checkmark"
                                    fill="none"
                                    stroke="currentColor"
                                    stroke-width="4"
                                    viewBox="0 0 24 24">
                                    <path
                                        class="checkmark-path"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M5 13l4 4L19 7" />
                                </svg>
                            </div>
                        </div>
                        <audio id="successSound" src="https://www.myinstants.com/media/sounds/para-sesi-efekti_PaUswM1.mp3" preload="auto"></audio>
                        <h2 class="text-2xl font-bold text-gray-800 mb-2">Pesanan Anda Telah Siap!</h2>
                        <p class="text-gray-600 mb-6">Terima kasih telah berbelanja. Pesanan Anda akan segera diproses.</p>
                        <button id="closeSuccessModal" class="px-5 py-2 bg-green-600 hover:bg-green-700 text-white font-semibold rounded-lg transition">
                            Tutup
                        </button> 
                    </div> 
                </div>
            <?php } ?>
    </section>


    <script>
        const checkoutModal = document.getElementById('checkoutModal');
        const checkoutBtn = document.getElementById('checkoutBtn');
        const closeModal = document.getElementById('closeModal');
        const closeIcon = document.getElementById('closeIcon');
        const successModal = document.getElementById('successModal');
        const closeSuccessModal = document.getElementById('closeSuccessModal');

        // buka modal
        checkoutBtn.addEventListener('click', () => {
            checkoutModal.classList.remove('hidden');
            checkoutModal.classList.add('flex');
        });

        // tutup modal
        [closeModal, closeIcon].forEach(btn => {
            btn.addEventListener('click', () => {
                checkoutModal.classList.remove('flex');
                checkoutModal.classList.add('hidden');
            });
        });

        // tutup modal sukses
        closeSuccessModal.addEventListener('click', () => {
            successModal.classList.remove('flex');
            successModal.classList.add('hidden');
        });

        const confirmCheckout = document.getElementById("confirmCheckout");
        const checkoutForm = document.querySelector("#checkoutModal form");

        confirmCheckout.addEventListener("click", function(e) {
            e.preventDefault(); // cegah reload
            console.log("Tombol Konfirmasi diklik");

            const formData = new FormData(checkoutForm);

            fetch("../actions/proses_checkout.php", {
                    method: "POST",
                    body: formData
                })
                .then(res => {
                    console.log("Respon diterima:", res);
                    return res.json();
                })
                .then(data => {
                    console.log("Data JSON:", data);
                    if (data.status === "success") {
                        checkoutModal.classList.add("hidden");
                        checkoutModal.classList.remove("flex");
                        successModal.classList.remove("hidden");
                        successModal.classList.add("flex");

                        const successSound = document.getElementById("successSound");
                        if (successSound) {
                            successSound.currentTime = 0;
                            successSound.volume = 0.7; // bisa kamu ubah 0 - 1
                            successSound.play().catch(() => {
                                console.warn("Audio gagal dimainkan (butuh interaksi user)");
                            });
                        }

                        closeSuccessModal.addEventListener("click", () => {
                            window.location.reload();
                        });
                    } else {
                        alert(data.message || "Checkout gagal.");
                    }
                })

                .catch(err => {
                    console.error("Error fetch:", err);
                    alert("Terjadi kesalahan koneksi ke server.");
                });
        });

        function updateQty(btn, change, harga) {
            const qtySpan = btn.parentElement.querySelector(".qty");
            let qty = parseInt(qtySpan.textContent);

            qty += change;
            if (qty < 1) qty = 1;
            qtySpan.textContent = qty;

            fetch("../actions/update_qty.php", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/x-www-form-urlencoded"
                    },
                    body: `id_keranjang=${btn.parentElement.dataset.id}&jumlah=${qty}`
                })
                .then(res => res.json())
                .then(data => {
                    if (data.status !== "success") {
                        alert("Gagal memperbarui jumlah di server!");
                    }
                })
                .catch(err => console.error("Error:", err));


            const subtotalElem = btn.closest(".flex.flex-col.sm\\:flex-row.items-start.sm\\:items-center.justify-between").querySelector(".subtotal");
            const subtotal = qty * harga;
            if (subtotalElem) subtotalElem.textContent = "Rp " + subtotal.toLocaleString("id-ID");

            updateTotal();
        }



        function updateTotal() {
            let total = 0;

            document.querySelectorAll(".subtotal").forEach(el => {
                // Ambil angka saja
                const val = el.textContent.replace(/\D/g, '');
                total += parseInt(val || 0);
            });

            // Update total harga
            const totalHargaElem = document.getElementById("total-harga");
            totalHargaElem.textContent = "Rp " + total.toLocaleString("id-ID");

            // Update total bayar (+ ongkir 15.000)
            const totalBayarElem = document.getElementById("total-bayar");
            totalBayarElem.textContent = "Rp " + (total + 15000).toLocaleString("id-ID");
        }
    </script>
</body>

</html>