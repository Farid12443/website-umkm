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
    </div>

    <!-- kiri -->
    <div class="hidden md:col-span-3 md:flex flex-col gap-6 justify-between">
      <!-- Container semua testimonial -->
      <div class="relative overflow-hidden">
        <div id="testimonialWrapper" class="flex transition-transform duration-700 ease-in-out">
          <!-- Testimonial 1 -->
          <div class="min-w-full card">
            <div class="flex flex-row items-start justify-between">
              <img src="https://via.placeholder.com/80" alt="Foto pelanggan" class="w-20 h-20 rounded-xl mb-4 object-cover" />
              <div class="text-right">
                <div class="flex items-center mb-1 text-yellow-400">
                  <i class="fa-solid fa-star"></i>
                  <i class="fa-solid fa-star"></i>
                  <i class="fa-solid fa-star"></i>
                  <i class="fa-solid fa-star"></i>
                  <i class="fa-regular fa-star"></i>
                </div>
                <span class="text-xs text-gray-400">12 Okt 2024</span> <!-- Diubah ke 2024 -->
              </div>
            </div>
            <p class="text-gray-700 italic mb-4">
              “Berasnya pulen dan harum banget, beda dari beras biasa! Sekarang tiap hari makan rasanya lebih nikmat.”
            </p>
            <h4 class="font-semibold text-lg text-gray-900">Siti Rahmawati</h4>
            <span class="text-sm text-gray-500">Semarang</span>
          </div>

          <!-- Testimonial 2 -->
          <div class="min-w-full card">
            <div class="flex flex-row items-start justify-between">
              <img src="https://via.placeholder.com/80" alt="Foto pelanggan" class="w-20 h-20 rounded-xl mb-4 object-cover" />
              <div class="text-right">
                <div class="flex items-center mb-1 text-yellow-400">
                  <i class="fa-solid fa-star"></i>
                  <i class="fa-solid fa-star"></i>
                  <i class="fa-solid fa-star"></i>
                  <i class="fa-regular fa-star"></i>
                  <i class="fa-regular fa-star"></i>
                </div>
                <span class="text-xs text-gray-400">18 Okt 2024</span> <!-- Diubah ke 2024 -->
              </div>
            </div>
            <p class="text-gray-700 italic mb-4">
              “Pelayanannya cepat dan ramah! Pengiriman juga aman, beras datang dalam keadaan bagus.”
            </p>
            <h4 class="font-semibold text-lg text-gray-900">Rizky Aditya</h4>
            <span class="text-sm text-gray-500">Salatiga</span>
          </div>

          <!-- Testimonial 3 -->
          <div class="min-w-full card">
            <div class="flex flex-row items-start justify-between">
              <img src="https://via.placeholder.com/80" alt="Foto pelanggan" class="w-20 h-20 rounded-xl mb-4 object-cover" />
              <div class="text-right">
                <div class="flex items-center mb-1 text-yellow-400">
                  <i class="fa-solid fa-star"></i>
                  <i class="fa-solid fa-star"></i>
                  <i class="fa-solid fa-star"></i>
                  <i class="fa-solid fa-star"></i>
                  <i class="fa-solid fa-star"></i>
                </div>
                <span class="text-xs text-gray-400">22 Okt 2024</span> <!-- Diubah ke 2024 -->
              </div>
            </div>
            <p class="text-gray-700 italic mb-4">
              “Saya sudah coba berbagai merek, tapi yang ini paling enak! Pulen, wangi, dan awet.”
            </p>
            <h4 class="font-semibold text-lg text-gray-900">Dewi Kartika</h4>
            <span class="text-sm text-gray-500">Solo</span>
          </div>
        </div>
      </div>

      <!-- Indicator -->
      <div class="flex gap-2 justify-center">
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
    <div class="md:hidden w-full flex flex-col items-center px-2 py-8">
      <!-- Container semua testimonial -->
      <div class="relative overflow-hidden max-w-sm w-full">
        <div id="testimonialWrapperMobile" class="flex transition-transform duration-700 ease-in-out">
          <!-- Testimonial 1 -->
          <div class="min-w-full card bg-white rounded-2xl shadow-md p-5">
            <div class="flex items-start justify-between mb-3">
              <img src="https://via.placeholder.com/80" alt="Foto pelanggan"
                class="w-16 h-16 rounded-xl object-cover" />
              <div class="text-right">
                <div class="flex items-center mb-1 text-yellow-400">
                  <i class="fa-solid fa-star"></i>
                  <i class="fa-solid fa-star"></i>
                  <i class="fa-solid fa-star"></i>
                  <i class="fa-solid fa-star"></i>
                  <i class="fa-regular fa-star"></i>
                </div>
                <span class="text-xs text-gray-400">12 Okt 2024</span>
              </div>
            </div>
            <p class="text-gray-700 italic mb-3">
              “Berasnya pulen dan harum banget, beda dari beras biasa! Sekarang tiap hari makan rasanya lebih nikmat.”
            </p>
            <h4 class="font-semibold text-gray-900">Siti Rahmawati</h4>
            <span class="text-sm text-gray-500">Semarang</span>
          </div>

          <!-- Testimonial 2 -->
          <div class="min-w-full card bg-white rounded-2xl shadow-md p-5">
            <div class="flex items-start justify-between mb-3">
              <img src="https://via.placeholder.com/80" alt="Foto pelanggan"
                class="w-16 h-16 rounded-xl object-cover" />
              <div class="text-right">
                <div class="flex items-center mb-1 text-yellow-400">
                  <i class="fa-solid fa-star"></i>
                  <i class="fa-solid fa-star"></i>
                  <i class="fa-solid fa-star"></i>
                  <i class="fa-regular fa-star"></i>
                  <i class="fa-regular fa-star"></i>
                </div>
                <span class="text-xs text-gray-400">18 Okt 2024</span>
              </div>
            </div>
            <p class="text-gray-700 italic mb-3">
              “Pelayanannya cepat dan ramah! Pengiriman juga aman, beras datang dalam keadaan bagus.”
            </p>
            <h4 class="font-semibold text-gray-900">Rizky Aditya</h4>
            <span class="text-sm text-gray-500">Salatiga</span>
          </div>

          <!-- Testimonial 3 -->
          <div class="min-w-full card bg-white rounded-2xl shadow-md p-5">
            <div class="flex items-start justify-between mb-3">
              <img src="https://via.placeholder.com/80" alt="Foto pelanggan"
                class="w-16 h-16 rounded-xl object-cover" />
              <div class="text-right">
                <div class="flex items-center mb-1 text-yellow-400">
                  <i class="fa-solid fa-star"></i>
                  <i class="fa-solid fa-star"></i>
                  <i class="fa-solid fa-star"></i>
                  <i class="fa-solid fa-star"></i>
                  <i class="fa-solid fa-star"></i>
                </div>
                <span class="text-xs text-gray-400">22 Okt 2024</span>
              </div>
            </div>
            <p class="text-gray-700 italic mb-3">
              “Saya sudah coba berbagai merek, tapi yang ini paling enak! Pulen, wangi, dan awet.”
            </p>
            <h4 class="font-semibold text-gray-900">Dewi Kartika</h4>
            <span class="text-sm text-gray-500">Solo</span>
          </div>
        </div>
      </div>

      <!-- Indicator -->
      <div class="flex gap-2 justify-center mt-4">
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
      initCarousel("testimonialWrapper", ".dot", "prevBtn", "nextBtn");
    }

    // Inisialisasi untuk mobile
    const mobileWrapper = document.getElementById("testimonialWrapperMobile");
    if (mobileWrapper && isVisible(mobileWrapper)) {
      initCarousel("testimonialWrapperMobile", ".dot", "prevBtnMobile", "nextBtnMobile");
    }
  });
</script>