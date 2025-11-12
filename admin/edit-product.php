<?php
include "../config/connection.php";
session_start();

if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit;
}

$error = '';
$success = '';

$idProduct = $_GET['id'] ?? 0;

// Ambil data produk
$stmt = $conn->prepare("SELECT * FROM produk WHERE id_produk = ?");
$stmt->bind_param("i", $idProduct);
$stmt->execute();
$result = $stmt->get_result();
$product = $result->fetch_assoc();
$stmt->close();

if (!$product) {
    die("Produk tidak ditemukan!");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = trim($_POST['nama_produk'] ?? '');
    $harga = (int)($_POST['harga'] ?? 0);
    $stok = (int)($_POST['stok'] ?? 0);
    $kategori = trim($_POST['kategori'] ?? '');

    // Upload foto jika ada
    $foto = $product['foto'];
    if (!empty($_FILES['foto']['name'])) {
        $uploadDir = '../uploads/';
        $fileName = basename($_FILES['foto']['name']);
        $targetFile = $uploadDir . $fileName;

        if (move_uploaded_file($_FILES['foto']['tmp_name'], $targetFile)) {
            $foto = $fileName;
        } else {
            $error = "Gagal upload foto!";
        }
    }

    if (empty($nama) || $harga <= 0 || $stok < 0) {
        $error = 'Nama, Harga, dan Stok tidak boleh kosong!';
    }

    if (!$error) {
        $stmt = $conn->prepare("UPDATE produk SET nama_produk=?, harga=?, stok=?, kategori=?, foto=? WHERE id_produk=?");
        $stmt->bind_param("siissi", $nama, $harga, $stok, $kategori, $foto, $idProduct);

        if ($stmt->execute()) {
            $success = 'Produk berhasil diperbarui!';
            echo "<script>alert('Produk berhasil diperbarui!'); window.location='index.php';</script>";
            exit;
        } else {
            $error = 'Produk gagal diperbarui: ' . $stmt->error;
        }
        $stmt->close();
    }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Produk - Admin Panel</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-50">

    <nav class="bg-blue-600 text-white shadow-lg">
        <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
            <h1 class="text-2xl font-bold">Admin Panel</h1>
            <a href="index.php" class="hover:text-gray-200">Kembali ke Dashboard</a>
        </div>
    </nav>

    <div class="max-w-2xl mx-auto px-4 py-8">
        <div class="bg-white rounded-lg shadow p-8">
            <h2 class="text-2xl font-bold text-gray-900 mb-6">Edit Produk</h2>

            <?php if ($error): ?>
                <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded"><?php echo htmlspecialchars($error); ?></div>
            <?php endif; ?>
            <?php if ($success): ?>
                <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded"><?php echo htmlspecialchars($success); ?></div>
            <?php endif; ?>

            <form method="POST" enctype="multipart/form-data" class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Nama Produk</label>
                    <input type="text" name="nama_produk" value="<?php echo htmlspecialchars($product['nama_produk']); ?>" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Harga (Rp)</label>
                        <input type="number" name="harga" value="<?php echo htmlspecialchars($product['harga']); ?>" min="0" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Stok</label>
                        <input type="number" name="stok" value="<?php echo htmlspecialchars($product['stok']); ?>" min="0" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Kategori Beras</label>
                    <select name="kategori" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent bg-white">
                        <option value="Premium" <?php if (($product['kategori'] ?? '') == 'Premium') echo 'selected'; ?>>Premium</option>
                        <option value="Organik" <?php if (($product['kategori'] ?? '') == 'Organik') echo 'selected'; ?>>Organik</option>
                        <option value="Murah" <?php if (($product['kategori'] ?? '') == 'Murah') echo 'selected'; ?>>Murah</option>
                    </select>
                </div>


                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Foto (biarkan kosong jika tidak diganti)</label>
                    <input type="file" name="foto" accept="image/*" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    <?php if ($product['foto']): ?>
                        <img src="../uploads/<?php echo $product['foto']; ?>" alt="Foto Produk" class="w-24 h-24 object-cover mt-2 rounded">
                    <?php endif; ?>
                </div>

                <div class="flex gap-4 pt-4">
                    <button type="submit" class="flex-1 bg-blue-600 text-white py-2 rounded-lg font-medium hover:bg-blue-700 transition">Simpan Perubahan</button>
                    <a href="index.php" class="flex-1 bg-gray-300 text-gray-700 py-2 rounded-lg font-medium hover:bg-gray-400 transition text-center">Batal</a>
                </div>
            </form>
        </div>
    </div>

</body>

</html>