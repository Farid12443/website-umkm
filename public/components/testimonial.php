<?php

if (session_status() == PHP_SESSION_NONE) {
  session_start();
}

include "../config/connection.php";

$isLoggedIn = isset($_SESSION['user_id']) && !empty($_SESSION['user_id']);

// Ambil data testimoni dan join ke tabel user
$query = "SELECT t.*, u.nama_lengkap, u.foto_profil, u.alamat
          FROM testimoni t
          JOIN user u ON t.id_user = u.id_user
          ORDER BY t.tanggal DESC";
$result_testimoni = mysqli_query($conn, $query);
?>




<section id="testimonial" class="max-w-7xl mx-auto bg">
  <div class="flex flex-col gap-12 bg-[#F5F2E7] md:grid grid-cols-5 md:items-center justify-between px-8 pt-18 md:pb-12 md:px-32 rounded-2xl">
    <!-- kanan -->
    <div class="col-span-2">
      <p class="text-green-600 font-semibold text-lg">Testimoni Pelanggan</p>
      <h2 class="text-4xl md:text-5xl font-extrabold text-gray-900 leading-tight">
        Apa Kata <br />
        <span class="text-green-700">Pelanggan Kami</span>
      </h2>
      <p class="text-gray-700 leading-relaxed">
        Kami percaya kualitas beras terbaik datang dari proses alami. Inilah pendapat pelanggan yang telah merasakan pulen dan harumnya beras pilihan dari petani kami.
      </p>
      <button
        id="tambahTestimoniBtn"
        class="mt-4 px-6 py-3 bg-[#41994E] hover:bg-green-700 text-white rounded-lg shadow-md transition-all duration-300 <?php echo !$isLoggedIn ? 'opacity-50 cursor-not-allowed' : ''; ?>"
        <?php echo !$isLoggedIn ? 'disabled' : ''; ?>>
        Tambah Testimoni
      </button>
      <!-- Modal -->
      <div id="modalTestimoni"
        class="hidden fixed inset-0 bg-black/50 backdrop-blur-sm items-center justify-center z-50 p-4">
        <div class="bg-white rounded-2xl p-6 w-full max-w-md shadow-lg relative mx-auto">
          <h2 class="text-lg font-semibold mb-4 text-gray-800">Tambah Testimoni</h2>

          <form id="formTestimoni" method="POST" action="../actions/simpan_testimoni.php" class="space-y-4">
            <input type="hidden" name="id_user" value="<?php echo $_SESSION['user_id']; ?>">
            <!-- Rating -->
            <div class="flex items-center gap-1">
              <label class="text-gray-700 font-medium">Rating:</label>
              <div id="stars" class="flex text-yellow-400 text-xl cursor-pointer">
                <i class="fa-regular fa-star" data-value="1"></i>
                <i class="fa-regular fa-star" data-value="2"></i>
                <i class="fa-regular fa-star" data-value="3"></i>
                <i class="fa-regular fa-star" data-value="4"></i>
                <i class="fa-regular fa-star" data-value="5"></i>
              </div>
              <input type="hidden" name="rating" id="ratingValue" value="0">
            </div>

            <!-- Pesan -->
            <div>
              <label for="pesan" class="block text-gray-700 font-medium mb-1">Pesan</label>
              <textarea name="pesan" id="pesan" rows="4" required
                class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-green-500 outline-none"></textarea>
            </div>

            <!-- Tombol aksi -->
            <div class="flex justify-end gap-2 mt-4">
              <button type="button" id="tutupModal" class="px-4 py-2 bg-gray-300 rounded-lg hover:bg-gray-400">Batal</button>
              <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700">Kirim</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <!-- kiri -->
    <div class="hidden md:col-span-3 md:flex flex-col gap-6 justify-between">
      <!-- Container semua testimonial -->
      <div class="relative overflow-hidden">
        <div id="testimonialWrapper" class="flex transition-transform duration-700 ease-in-out">

          <?php if (mysqli_num_rows($result_testimoni) > 0): ?>
            <?php while ($row = mysqli_fetch_assoc($result_testimoni)): ?>
              <div class="min-w-full card bg-white p-4 rounded-2xl">
                <div class="flex flex-row items-start justify-between">
                  <img src="../uploads/<?= htmlspecialchars($row['foto_profil']) ?>"
                    alt="Foto pelanggan"
                    class="w-20 h-20 rounded-xl mb-4 object-cover" />

                  <div class="text-right">
                    <div class="flex items-center mb-1 text-yellow-400">
                      <?php for ($i = 1; $i <= 5; $i++): ?>
                        <?php if ($i <= $row['rating']): ?>
                          <i class="fa-solid fa-star"></i>
                        <?php else: ?>
                          <i class="fa-regular fa-star"></i>
                        <?php endif; ?>
                      <?php endfor; ?>
                    </div>
                    <span class="text-xs text-gray-400"><?= date('d M Y', strtotime($row['tanggal'])) ?></span>
                  </div>
                </div>
                <p class="text-gray-700 italic mb-4">“<?= htmlspecialchars($row['pesan']) ?>”</p>
                <h4 class="font-semibold text-lg text-gray-900"><?= htmlspecialchars($row['nama_lengkap']) ?></h4>
                <span class="text-sm text-gray-500"><?= htmlspecialchars($row['alamat']) ?></span>
              </div>
            <?php endwhile; ?>
          <?php else: ?>
            <div class="min-w-full text-center text-gray-500 py-10">Belum ada testimoni.</div>
          <?php endif; ?>
        </div>

      </div>

      <!-- Indicator -->
      <!-- Desktop -->
      <div class="flex gap-2 justify-center desktop-dots" id="desktopDots"></div>


      <!-- Tombol navigasi -->
      <div class="flex flex-row gap-4 items-center justify-center">
        <button id="prevBtn" class="w-10 h-10 bg-green-100 hover:bg-green-200 text-green-600 rounded-full flex items-center justify-center transition" aria-label="Previous testimonial">
          <i class="fa-solid fa-chevron-left text-lg"></i>
        </button>
        <button id="nextBtn" class="w-10 h-10 bg-green-100 hover:bg-green-200 text-green-600 rounded-full flex items-center justify-center transition" aria-label="Next testimonial">
          <i class="fa-solid fa-chevron-right text-lg"></i>
        </button>
      </div>
    </div>

    <!-- Testimonial Mobile -->
    <div class="md:hidden w-full flex flex-col items-center py-8">
      <!-- Container semua testimonial -->
      <div class="relative overflow-hidden max-w-sm w-full">
        <div id="testimonialWrapperMobile" class="flex transition-transform duration-700 ease-in-out">
          <?php mysqli_data_seek($result_testimoni, 0); // reset pointer 
          ?>
          <?php if (mysqli_num_rows($result_testimoni) > 0): ?>
            <?php while ($row = mysqli_fetch_assoc($result_testimoni)): ?>
              <div class="min-w-full card  bg-white p-4 rounded-2xl">
                <div class="flex items-start justify-between mb-3">
                  <img src="../uploads/<?= htmlspecialchars($row['foto_profil']) ?>" alt="Foto pelanggan"
                    class="w-16 h-16 rounded-xl object-cover" />
                  <div class="text-right">
                    <div class="flex items-center mb-1 text-yellow-400">
                      <?php for ($i = 1; $i <= 5; $i++): ?>
                        <?php if ($i <= $row['rating']): ?>
                          <i class="fa-solid fa-star"></i>
                        <?php else: ?>
                          <i class="fa-regular fa-star"></i>
                        <?php endif; ?>
                      <?php endfor; ?>
                    </div>
                    <span class="text-xs text-gray-400"><?= date('d M Y', strtotime($row['tanggal'])) ?></span>
                  </div>
                </div>
                <p class="text-gray-700 italic mb-3">“<?= htmlspecialchars($row['pesan']) ?>”</p>
                <h4 class="font-semibold text-gray-900"><?= htmlspecialchars($row['nama_lengkap']) ?></h4>
                <span class="text-sm text-gray-500">Pelanggan</span>
              </div>
            <?php endwhile; ?>
          <?php else: ?>
            <div class="min-w-full text-center text-gray-500 py-10">Belum ada testimoni.</div>
          <?php endif; ?>
        </div>

      </div>

      <!-- Indicator -->
      <!-- Mobile -->
      <div class="flex gap-2 pt-4 justify-center mobile-dots" id="mobileDots"></div>

      <!-- Tombol navigasi -->
      <div class="flex gap-4 mt-4">
        <button id="prevBtnMobile" class="w-10 h-10 bg-green-100 hover:bg-green-200 text-green-600 rounded-full flex items-center justify-center transition">
          <i class="fa-solid fa-chevron-left text-lg"></i>
        </button>
        <button id="nextBtnMobile" class="w-10 h-10 bg-green-100 hover:bg-green-200 text-green-600 rounded-full flex items-center justify-center transition">
          <i class="fa-solid fa-chevron-right text-lg"></i>
        </button>
      </div>
    </div>

  </div>
</section>

<!-- Script Carousel -->
<script>
  document.addEventListener('DOMContentLoaded', () => {
    // Fungsi untuk inisialisasi carousel
    function initCarousel(wrapperId, dotsContainerId, prevBtnId, nextBtnId) {
      const wrapper = document.getElementById(wrapperId);
      const dotsContainer = document.getElementById(dotsContainerId);
      const prevBtn = document.getElementById(prevBtnId);
      const nextBtn = document.getElementById(nextBtnId);

      if (!wrapper || !dotsContainer || !prevBtn || !nextBtn) return;

      const originalSlides = Array.from(wrapper.children);
      const originalSlidesLength = originalSlides.length;

      // clone untuk looping
      const firstClone = originalSlides[0].cloneNode(true);
      const lastClone = originalSlides[originalSlidesLength - 1].cloneNode(true);
      wrapper.appendChild(firstClone);
      wrapper.insertBefore(lastClone, wrapper.firstChild);

      let index = 1;
      wrapper.style.transform = `translateX(-${index * 100}%)`;
      let isTransitioning = false;
      let autoSlideInterval;

      // buat dot dinamis
      const dotsArray = [];
      dotsContainer.innerHTML = '';
      for (let i = 0; i < originalSlidesLength; i++) {
        const dot = document.createElement('span');
        dot.className = 'dot w-2 h-2 rounded-full bg-gray-300';
        dot.addEventListener('click', () => showSlide(i + 1));
        dotsContainer.appendChild(dot);
        dotsArray.push(dot);
      }

      function updateDotsWindow() {
        const total = dotsArray.length;
        let activeIndex = (index - 1 + total) % total; // index slide asli

        const windowSize = 3;
        let start, end;

        if (total <= windowSize) {
          // Kalau dot total <= window, tampilkan semua
          start = 0;
          end = total - 1;
        } else {
          // Geser window berdasarkan slide aktif
          if (activeIndex < 1) {
            start = 0;
            end = windowSize - 1;
          } else if (activeIndex > total - 2) {
            end = total - 1;
            start = end - (windowSize - 1);
          } else {
            start = activeIndex - 1;
            end = activeIndex + 1;
          }
        }

        dotsArray.forEach((dot, i) => {
          // tampilkan hanya dot di window
          dot.style.display = (i >= start && i <= end) ? 'inline-block' : 'none';

          // update dot aktif
          dot.classList.toggle('bg-green-600', i === activeIndex);
          dot.classList.toggle('bg-gray-300', i !== activeIndex);
        });
      }




      function showSlide(i) {
        if (isTransitioning) return;
        isTransitioning = true;
        index = i;
        wrapper.style.transition = 'transform 0.7s cubic-bezier(0.33,1,0.68,1)';
        wrapper.style.transform = `translateX(-${index * 100}%)`;
        updateDotsWindow();
      }

      wrapper.addEventListener('transitionend', () => {
        isTransitioning = false;
        const slidesCount = wrapper.children.length;
        if (index === 0) {
          wrapper.style.transition = 'none';
          index = originalSlidesLength;
          wrapper.style.transform = `translateX(-${index * 100}%)`;
        } else if (index === slidesCount - 1) {
          wrapper.style.transition = 'none';
          index = 1;
          wrapper.style.transform = `translateX(-${index * 100}%)`;
        }
      });

      prevBtn.addEventListener('click', () => showSlide(index - 1));
      nextBtn.addEventListener('click', () => showSlide(index + 1));

      wrapper.addEventListener('mouseenter', () => clearInterval(autoSlideInterval));
      wrapper.addEventListener('mouseleave', startAutoSlide);

      function startAutoSlide() {
        autoSlideInterval = setInterval(() => showSlide(index + 1), 5000);
      }

      startAutoSlide();
      updateDotsWindow();
    }


    // Fungsi untuk memeriksa apakah elemen terlihat
    function isVisible(element) {
      return getComputedStyle(element).display !== 'none';
    }

    // Inisialisasi untuk desktop
    const desktopWrapper = document.getElementById("testimonialWrapper");
    if (desktopWrapper && isVisible(desktopWrapper)) {
      initCarousel("testimonialWrapper", "desktopDots", "prevBtn", "nextBtn");

    }




    // Inisialisasi untuk mobile
    const mobileWrapper = document.getElementById("testimonialWrapperMobile");
    if (mobileWrapper && isVisible(mobileWrapper)) {
      initCarousel("testimonialWrapperMobile", "mobileDots", "prevBtnMobile", "nextBtnMobile");
    }
  });

  const modal = document.getElementById('modalTestimoni');
  const btn = document.getElementById('tambahTestimoniBtn');
  const closeModal = document.getElementById('tutupModal');

  <?php if ($isLoggedIn): ?>
    // Jika sudah login, tombol bisa buka modal
    btn.addEventListener('click', () => modal.classList.remove('hidden'));
  <?php else: ?>
    // Jika belum login, tombol muncul alert
    btn.addEventListener('click', () => alert('Silakan login terlebih dahulu untuk menambahkan testimoni.'));
  <?php endif; ?>

  closeModal.addEventListener('click', () => modal.classList.add('hidden'));

  // Rating bintang interaktif
  const stars = document.querySelectorAll('#stars i');
  const ratingValue = document.getElementById('ratingValue');

  stars.forEach(star => {
    star.addEventListener('click', () => {
      const value = parseInt(star.getAttribute('data-value'));
      ratingValue.value = value;
      stars.forEach((s, i) => {
        s.classList.toggle('fa-solid', i < value);
        s.classList.toggle('fa-regular', i >= value);
      });
    });
  });
</script>