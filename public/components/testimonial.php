<?php
include "../config/connection.php";
// session_start();

// Ambil data testimoni dan join ke tabel user
$query = "SELECT t.*, u.nama 
          FROM testimoni t
          JOIN user u ON t.id_user = u.id_user
          ORDER BY t.tanggal DESC";
$result_testimoni = mysqli_query($conn, $query);
?>




<section id="testimonial" class="max-w-7xl mx-auto">
  <div class="flex flex-col gap-12 my-12 md:grid grid-cols-5 md:mt-8 items-center justify-between px-8 py-18 md:pb-0 md:px-32 rounded-2xl">
    <!-- kanan -->
    <div class="col-span-2">
      <p class="text-green-600 font-semibold text-lg">Testimonial</p>
      <h2 class="text-4xl md:text-5xl font-extrabold text-gray-900 leading-tight">
        What Our Clients <br />
        <span class="text-green-700">Say About Us!</span>
      </h2>
      <p class="text-gray-700 leading-relaxed">
        Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam et eos.
        Clita erat ipsum et lorem et sit sed stet lorem sit clita duo justo.
      </p>
      <button class="mt-4 px-6 py-3 bg-green-600 hover:bg-green-700 text-white rounded-lg shadow-md transition-all duration-300">
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
              <div class="min-w-full card">
                <div class="flex flex-row items-start justify-between">
                  <img src="../uploads/<?//= htmlspecialchars($row['foto']) ?>"
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
                <h4 class="font-semibold text-lg text-gray-900"><?= htmlspecialchars($row['nama']) ?></h4>
                <span class="text-sm text-gray-500">alamat</span>
              </div>
            <?php endwhile; ?>
          <?php else: ?>
            <div class="min-w-full text-center text-gray-500 py-10">Belum ada testimoni.</div>
          <?php endif; ?>
        </div>

      </div>

      <!-- Indicator -->
      <!-- Desktop -->
      <div class="flex gap-2 justify-center desktop-dots">
        <span class="dot w-2 h-2 bg-green-600 rounded-full"></span>
        <span class="dot w-2 h-2 bg-gray-300 rounded-full"></span>
        <span class="dot w-2 h-2 bg-gray-300 rounded-full"></span>
      </div>

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
              <div class="min-w-full card rounded-2xl">
                <div class="flex items-start justify-between mb-3">
                  <img src="https://via.placeholder.com/80" alt="Foto pelanggan"
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
                <h4 class="font-semibold text-gray-900"><?= htmlspecialchars($row['nama']) ?></h4>
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
      <div class="flex gap-2 justify-center mt-4 mobile-dots">
        <span class="dot w-2 h-2 bg-green-600 rounded-full"></span>
        <span class="dot w-2 h-2 bg-gray-300 rounded-full"></span>
        <span class="dot w-2 h-2 bg-gray-300 rounded-full"></span>
      </div>

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
    function initCarousel(wrapperId, dotsSelector, prevBtnId, nextBtnId) {
      const wrapper = document.getElementById(wrapperId);
      const dots = document.querySelectorAll(dotsSelector);
      const prevBtn = document.getElementById(prevBtnId);
      const nextBtn = document.getElementById(nextBtnId);

      if (!wrapper || !dots.length || !prevBtn || !nextBtn) {
        console.error(`Carousel elements not found for ${wrapperId}. Check HTML structure.`);
        return;
      }

      const slides = wrapper.children;
      const total = slides.length;

      // 🪄 Clone first & last slides for seamless looping
      const firstClone = slides[0].cloneNode(true);
      const lastClone = slides[total - 1].cloneNode(true);
      wrapper.appendChild(firstClone);
      wrapper.insertBefore(lastClone, slides[0]);

      let index = 1; // start di slide pertama (setelah clone)
      const allSlides = wrapper.children;
      const slideCount = allSlides.length;

      // Set posisi awal
      wrapper.style.transform = `translateX(-${index * 100}%)`;

      let isTransitioning = false;
      let autoSlideInterval;

      function showSlide(i) {
        if (isTransitioning) return;
        isTransitioning = true;

        index = i;
        wrapper.style.transition = "transform 0.7s cubic-bezier(0.33,1,0.68,1)";
        wrapper.style.transform = `translateX(-${index * 100}%)`;

        // Update dots (hanya untuk slide asli)
        dots.forEach((dot, dIndex) => {
          const activeIndex = (index - 1 + total) % total;
          dot.classList.toggle("bg-green-600", dIndex === activeIndex);
          dot.classList.toggle("bg-gray-300", dIndex !== activeIndex);
        });
      }

      wrapper.addEventListener("transitionend", () => {
        isTransitioning = false;
        if (index === 0) {
          wrapper.style.transition = "none";
          index = total;
          wrapper.style.transform = `translateX(-${index * 100}%)`;
        } else if (index === slideCount - 1) {
          wrapper.style.transition = "none";
          index = 1;
          wrapper.style.transform = `translateX(-${index * 100}%)`;
        }
      });

      function startAutoSlide() {
        autoSlideInterval = setInterval(() => showSlide(index + 1), 5000);
      }

      function stopAutoSlide() {
        clearInterval(autoSlideInterval);
      }

      prevBtn.addEventListener("click", () => showSlide(index - 1));
      nextBtn.addEventListener("click", () => showSlide(index + 1));

      wrapper.addEventListener('mouseenter', stopAutoSlide);
      wrapper.addEventListener('mouseleave', startAutoSlide);

      document.addEventListener('keydown', (e) => {
        if (e.key === 'ArrowLeft') showSlide(index - 1);
        if (e.key === 'ArrowRight') showSlide(index + 1);
      });

      startAutoSlide();
    }

    // Fungsi untuk memeriksa apakah elemen terlihat
    function isVisible(element) {
      return getComputedStyle(element).display !== 'none';
    }

    // Inisialisasi untuk desktop
    const desktopWrapper = document.getElementById("testimonialWrapper");
    if (desktopWrapper && isVisible(desktopWrapper)) {
      initCarousel("testimonialWrapper", ".desktop-dots .dot", "prevBtn", "nextBtn");
    }




    // Inisialisasi untuk mobile
    const mobileWrapper = document.getElementById("testimonialWrapperMobile");
    if (mobileWrapper && isVisible(mobileWrapper)) {
      initCarousel("testimonialWrapperMobile", ".mobile-dots .dot", "prevBtnMobile", "nextBtnMobile");
    }
  });

  const modal = document.getElementById('modalTestimoni');
  const btn = document.querySelector('button.bg-green-600');
  const closeModal = document.getElementById('tutupModal');

  btn.addEventListener('click', () => modal.classList.remove('hidden'));
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