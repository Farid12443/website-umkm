<?php
include "../config/connection.php";
session_start();

// Proteksi halaman hanya untuk admin
if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit;
}

$no = 1;

$adminId = $_SESSION['admin_id'];
$stmt = $conn->prepare("SELECT id_admin, username FROM admin WHERE id_admin = ?");
$stmt->bind_param("i", $adminId);
$stmt->execute();
$admin = $stmt->get_result()->fetch_assoc();
$stmt->close();

// Hitung total produk (hanya yang aktif)
$stmt = $conn->prepare("SELECT COUNT(id_produk) as total FROM produk WHERE status='active'");
$stmt->execute();
$totalProduk = $stmt->get_result()->fetch_assoc();
$stmt->close();

// Ambil semua produk aktif
$stmt = $conn->prepare("SELECT * FROM produk WHERE status='active' ORDER BY created_at DESC");
$stmt->execute();
$products = $stmt->get_result();
$stmt->close();
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>

    <!-- load tailwindcss -->
    <link rel="stylesheet" href="../public/css/style.css">
    <!-- load fontawesome -->
    <script src="https://kit.fontawesome.com/1df42cf205.js" crossorigin="anonymous"></script>

    <!-- load google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant:ital,wght@0,300..700;1,300..700&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Marmelad&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>

<body class="bg-gray-50">

    <!-- Navbar -->
    <nav class="bg-blue-600 text-white shadow-lg fixed w-full z-10">
        <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
            <h1 class="text-2xl font-bold">Dashboard Admin</h1>
            <div class="flex items-center gap-4">
                <span>Halo, <?php echo htmlspecialchars($admin['username']); ?></span>
                <a href="logout.php" class="bg-red-500 hover:bg-red-600 px-4 py-2 rounded">Logout</a>
            </div>
        </div>
    </nav>

    <div class="max-w-7xl px-4 py-8 mx-32 pt-28">
        <!-- Stats -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-8">
            <div class="bg-white rounded-lg shadow p-6">
                <h3 class="text-gray-600 text-sm font-medium">Total Produk</h3>
                <p class="text-3xl font-bold text-blue-600 mt-2"><?php echo $totalProduk['total']; ?></p>
            </div>
            <div class="bg-white rounded-lg shadow p-6">
                <h3 class="text-gray-600 text-sm font-medium">Total Stok</h3>
                <p class="text-3xl font-bold text-green-600 mt-2">
                    <?php
                    // Total stok
                    $stmt = $conn->prepare("SELECT SUM(stok) as total_stock FROM produk");
                    $stmt->execute();
                    $stock = $stmt->get_result()->fetch_assoc();
                    echo $stock['total_stock'] ?? 0;
                    $stmt->close();
                    ?>
                </p>
            </div>
            <div class="bg-white rounded-lg shadow p-6">
                <h3 class="text-gray-600 text-sm font-medium">Total Nilai</h3>
                <p class="text-3xl font-bold text-purple-600 mt-2">
                    Rp <?php
                        $stmt = $conn->prepare("SELECT SUM(harga * stok) as total_value FROM produk");
                        $stmt->execute();
                        $value = $stmt->get_result()->fetch_assoc();
                        $stmt->close();
                        echo number_format($value['total_value'] ?? 0, 0, ',', '.');
                        ?>
                </p>
            </div>
        </div>
        <!-- Produk Section -->
        <div class="bg-white rounded-lg shadow">
            <div class="p-6 border-b border-gray-200 flex justify-between items-center">
                <h2 class="text-2xl font-bold text-gray-900">Daftar Produk</h2>
                <a href="add-product.php" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">+ Tambah Produk</a>
            </div>

            <?php if ($products->num_rows > 0): ?>
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-gray-100 border-b">
                            <tr>
                                <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">No</th>
                                <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Nama Produk</th>
                                <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Harga</th>
                                <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Stok</th>
                                <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Kategori</th>
                                <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Foto</th>
                                <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Tanggal</th>
                                <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($product = $products->fetch_assoc()): ?>
                                <tr class="border-t hover:bg-gray-50">
                                    <td class="px-4 py-2 text-sm text-gray-900"><?php echo $no++; ?></td>
                                    <td class="px-4 py-2 text-sm text-gray-900"><?php echo htmlspecialchars($product['nama_produk']); ?></td>
                                    <td class="px-4 py-2 text-sm text-gray-900">Rp <?php echo number_format($product['harga'], 0, ',', '.'); ?></td>
                                    <td class="px-4 py-2 text-sm text-gray-900"><?php echo $product['stok']; ?></td>
                                    <td class="px-4 py-2 text-sm text-gray-900"><?php echo htmlspecialchars($product['kategori']); ?></td>
                                    <td class="px-4 py-2 text-sm text-gray-900">
                                        <?php if ($product['foto']): ?>
                                            <img src="../uploads/<?php echo $product['foto']; ?>" alt="Foto Produk" class="w-16 h-16 object-cover rounded">
                                        <?php else: ?>
                                            -
                                        <?php endif; ?>
                                    </td>
                                    <td class="px-4 py-2 text-sm text-gray-600"><?php echo date('d/m/Y', strtotime($product['created_at'])); ?></td>
                                    <td class="px-4 py-2 text-sm space-x-2">
                                        <a href="edit-product.php?id=<?php echo $product['id_produk']; ?>" class="text-blue-600 hover:underline">Edit</a>
                                        <a href="delete-product.php?id=<?php echo $product['id_produk']; ?>" class="text-red-600 hover:underline" onclick="return confirm('Yakin hapus produk ini?')">Hapus</a>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            <?php else: ?>
                <div class="p-6 text-center text-gray-500">
                    <p>Belum ada produk. <a href="add-product.php" class="text-blue-600 hover:underline">Tambah produk sekarang</a></p>
                </div>
            <?php endif; ?>
        </div>
    </div>

</body>

</html>