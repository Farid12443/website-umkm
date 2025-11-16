<?php
include "../config/connection.php";
session_start();

//pastikan admin login
if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit;
}

$success = '';
$error = '';

$uploadDir = '../uploads/';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = trim($_POST['nama_produk'] ?? '');
    $harga = (int)($_POST['harga'] ?? 0);
    $stok = (int)($_POST['stok'] ?? 0);
    $kategori = trim($_POST['kategori'] ?? '');

    // upload file foto
    $foto = null;
    if (!empty($_FILES['foto']['name'])) {
        $tmpName = $_FILES['foto']['tmp_name'];
        $fileName = basename($_FILES['foto']['name']);
        $targetFile = $uploadDir . $fileName;

        if (move_uploaded_file($tmpName, $targetFile)) {
            $foto = $fileName;
        } else {
            $error = 'Gagal mengupload foto!';
        }
    }

    // Validasi
    if (empty($nama) || $harga <= 0 || $stok < 0) {
        $error = 'Nama produk, harga, dan stok tidak boleh kosong!';
    }

    if (!$error) {
        $stmt = $conn->prepare("INSERT INTO produk (nama_produk, harga, stok, kategori, foto, created_at) VALUES (?, ?, ?, ?, ?, NOW())");
        $stmt->bind_param("siiss", $nama, $harga, $stok, $kategori, $foto);

        if ($stmt->execute()) {
            $success = 'Produk berhasil ditambah!';
            echo "<script>alert('Produk berhasil ditambah!'); window.location='index.php';</script>";
            exit;
        } else {
            $error = 'Gagal menambah produk: ' . $stmt->error;
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
    <title>Tambah Produk - Admin Panel</title>
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
            <h2 class="text-2xl font-bold text-gray-900 mb-6">Tambah Produk Baru</h2>

            <?php if ($error): ?>
                <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
                    <?php echo htmlspecialchars($error); ?>
                </div>
            <?php endif; ?>

            <form method="POST" enctype="multipart/form-data" class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Nama Produk</label>
                    <input type="text" name="nama_produk" value="<?php echo htmlspecialchars($nama ?? ''); ?>" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Harga (Rp)</label>
                        <input type="number" name="harga" value="<?php echo htmlspecialchars($harga ?? ''); ?>" min="0" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Stok</label>
                        <input type="number" name="stok" value="<?php echo htmlspecialchars($stok ?? ''); ?>" min="0" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Kategori Beras</label>
                    <select name="kategori" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent bg-white">
                        <option value="">-- Pilih Jenis Beras --</option>
                        <option value="Premium" <?php if (($kategori ?? '') == 'Premium') echo 'selected'; ?>>Premium</option>
                        <option value="Organik" <?php if (($kategori ?? '') == 'Organik') echo 'selected'; ?>>Organik</option>
                        <option value="Murah" <?php if (($kategori ?? '') == 'Murah') echo 'selected'; ?>>Murah</option>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Foto</label>
                    <input type="file" name="foto" accept="image/*" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                </div>

                <div class="flex gap-4 pt-4">
                    <button type="submit" class="flex-1 bg-blue-600 text-white py-2 rounded-lg font-medium hover:bg-blue-700 transition">Simpan Produk</button>
                    <a href="index.php" class="flex-1 bg-gray-300 text-gray-700 py-2 rounded-lg font-medium hover:bg-gray-400 transition text-center">Batal</a>
                </div>
            </form>
        </div>
    </div>
</body>

</html>