<?php
$testimonials = [
  ['name' => 'Udin', 'address' => 'Suruh, Semarang', 'star' => '⭐⭐⭐⭐⭐', 'description' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Esse, laudantium.', 'img' => 'https://asset.kompas.com/crops/uWy9sjOHu_N21k29z9PxyS63OPg=/0x0:1000x667/1200x800/data/photo/2022/05/04/6271c5c7d49c9.jpg'],
  ['name' => 'Sari', 'address' => 'Jakarta', 'star' => '⭐⭐⭐⭐', 'description' => 'Produk sangat bagus dan berkualitas tinggi.', 'img' => 'https://randomuser.me/api/portraits/women/44.jpg'],
  ['name' => 'Budi', 'address' => 'Bandung', 'star' => '⭐⭐⭐⭐⭐', 'description' => 'Pengiriman cepat dan pelayanan ramah.', 'img' => 'https://randomuser.me/api/portraits/men/46.jpg'],
  ['name' => 'Rina', 'address' => 'Surabaya', 'star' => '⭐⭐⭐⭐', 'description' => 'Sangat puas dengan produk ini.', 'img' => 'https://randomuser.me/api/portraits/women/65.jpg'],
  ['name' => 'Agus', 'address' => 'Yogyakarta', 'star' => '⭐⭐⭐⭐⭐', 'description' => 'Rekomendasi untuk semua keluarga.', 'img' => 'https://randomuser.me/api/portraits/men/52.jpg']
];

$row1 = array_slice($testimonials, 0, ceil(count($testimonials) / 2));
$row2 = array_slice($testimonials, ceil(count($testimonials) / 2));
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Smooth Testimonial Marquee</title>
</head>

<body class="font-sans bg-gray-100 flex justify-center items-center min-h-screen">
  <div class="max-w-7xl mx-auto overflow-hidden" id="testimonial">
    <div class="flex flex-col md:flex-col justify-between px-8 py-8 md:px-32 rounded-2xl">

      <!-- Judul -->
      <div class="flex flex-col gap-6 max-w-2xl mb-8 mx-auto text-center">
        <h1 class="text-4xl md:text-5xl font-bold text-black">Testimonial</h1>
        <p class="text-lg md:text-xl font-light text-gray-700">
          Beras premium pilihan, dipanen segar dan diolah higienis untuk keluarga Anda.
        </p>
      </div>

      <!-- Baris Atas -->
      <div class="flex px-8 py-8 md:px-32 rounded-2xl [scrollbar-width:none] [-ms-overflow-style:none]" id="row1">
        <?php foreach ($row1 as $item) { ?>
          <div class="flex-shrink-0 w-[500px] flex items-center border rounded-2xl p-3 shadow-sm hover:shadow-md transition bg-white mr-6">
            <img src="<?= htmlspecialchars($item['img']) ?>" alt="Foto <?= htmlspecialchars($item['name']) ?>" class="w-20 h-20 rounded-full object-cover mr-6" />
            <div class="flex-1">
              <div class="flex justify-between items-start mb-2">
                <div>
                  <span class="block font-semibold text-gray-900"><?= htmlspecialchars($item['name']) ?></span>
                  <span class="text-sm text-gray-500"><?= htmlspecialchars($item['address']) ?></span>
                </div>
                <div class="text-yellow-500"><?= htmlspecialchars($item['star']) ?></div>
              </div>
              <p class="text-gray-700 text-sm md:text-base"><?= htmlspecialchars($item['description']) ?></p>
            </div>
          </div>
        <?php } ?>
      </div>

      <!-- Baris Bawah -->
      <div class="flex w-max my-4 [scrollbar-width:none] [-ms-overflow-style:none]" id="row2">
        <?php foreach ($row2 as $item) { ?>
          <div class="flex-shrink-0 w-[500px] flex items-center border rounded-2xl p-3 shadow-sm hover:shadow-md transition bg-white mr-6">
            <img src="<?= htmlspecialchars($item['img']) ?>" alt="Foto <?= htmlspecialchars($item['name']) ?>" class="w-20 h-20 rounded-full object-cover mr-6" />
            <div class="flex-1">
              <div class="flex justify-between items-start mb-2">
                <div>
                  <span class="block font-semibold text-gray-900"><?= htmlspecialchars($item['name']) ?></span>
                  <span class="text-sm text-gray-500"><?= htmlspecialchars($item['address']) ?></span>
                </div>
                <div class="text-yellow-500"><?= htmlspecialchars($item['star']) ?></div>
              </div>
              <p class="text-gray-700 text-sm md:text-base"><?= htmlspecialchars($item['description']) ?></p>
            </div>
          </div>
        <?php } ?>
      </div>

    </div>
  </div>

  <script>
    function createMarquee(row, speed, direction = 1) {
      row.innerHTML += row.innerHTML;
      let width = row.scrollWidth / 2;
      let x = direction === 1 ? 0 : -width;
      let paused = false;

      row.addEventListener("mouseenter", () => paused = true);
      row.addEventListener("mouseleave", () => paused = false);

      function animate() {
        if (!paused) {
          x -= speed * direction;
          if (direction === 1 && Math.abs(x) >= width) {
            x = 0;
          } else if (direction === -1 && x >= 0) {
            x = -width;
          }
        }
        row.style.transform = `translateX(${x}px)`;
        requestAnimationFrame(animate);
      }
      animate();
    }

    createMarquee(document.getElementById("row1"), 1, 1);
    createMarquee(document.getElementById("row2"), 1, -1);
  </script>
</body>

</html>