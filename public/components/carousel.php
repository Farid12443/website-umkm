<div id="custom-carousel" class="relative w-full h-[70vh] md:h-[600px] overflow-hidden rounded-b-2xl">
    <!-- Slide 1 -->
    <div class="carousel-item absolute inset-0 opacity-100 transition-opacity duration-1000 ease-in-out">
        <img src="images/pengeringan.png" alt="Slide 1" class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-black/40 flex flex-col items-center justify-center text-center text-white px-6">
            <h2 class="text-3xl md:text-5xl font-bold mb-4">Tentang Kami</h2>
            <p class="text-base md:text-xl mb-6 max-w-xl">
                Kami menghadirkan beras berkualitas terbaik langsung dari petani lokal.
            </p>
        </div>
    </div>

    <!-- Slide 2 -->
    <div class="carousel-item absolute inset-0 opacity-0 transition-opacity duration-1000 ease-in-out">
        <img src="images/pemilihan.png" alt="Slide 2" class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-black/40 flex flex-col items-center justify-center text-center text-white px-6">
            <h2 class="text-3xl md:text-5xl font-bold mb-4">Kualitas Terbaik</h2>
            <p class="text-base md:text-xl mb-6 max-w-xl">
                Proses penggilingan modern untuk hasil yang bersih dan pulen.
            </p>
           
        </div>
    </div>

    <!-- Slide 3 -->
    <div class="carousel-item absolute inset-0 opacity-0 transition-opacity duration-1000 ease-in-out">
        <img src="images/penggilingan.png" alt="Slide 3" class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-black/40 flex flex-col items-center justify-center text-center text-white px-6">
            <h2 class="text-3xl md:text-5xl font-bold mb-4">Dari Petani Untuk Anda</h2>
                <p class="text-base md:text-xl mb-6 max-w-xl">
                    Kami mendukung kesejahteraan petani dengan harga yang adil.
                </p>
        </div>
    </div>

    <!-- back -->
    <button id="back-home"
        class="absolute top-5 left-16 -translate-x-1/2 md:top-8 md:left-20 bg-white/30 hover:bg-white/50 text-white text-sm md:text-base font-semibold px-4 py-2 rounded-full backdrop-blur-sm">
        <i class="fa-solid fa-arrow-left"></i> Kembali
    </button>

    <!-- sebelum selanjutnya -->
    <button id="prev"
        class="absolute top-1/2 left-3 md:left-6 -translate-y-1/2 bg-white/30 hover:bg-white/50 text-white w-10 h-10 md:w-12 md:h-12 flex items-center justify-center rounded-full transition duration-300">
        <i class="fa-solid fa-chevron-left text-lg md:text-xl"></i>
    </button>

    <button id="next"
        class="absolute top-1/2 right-3 md:right-6 -translate-y-1/2 bg-white/30 hover:bg-white/50 text-white w-10 h-10 md:w-12 md:h-12 flex items-center justify-center rounded-full transition duration-300">
        <i class="fa-solid fa-chevron-right text-lg md:text-xl"></i>
    </button>

    <!-- titik -->
    <div class="absolute bottom-5 left-1/2 -translate-x-1/2 flex space-x-2 md:space-x-3">
        <button class="indicator w-2.5 h-2.5 md:w-3 md:h-3 rounded-full bg-white/40 hover:bg-white" data-slide="0"></button>
        <button class="indicator w-2.5 h-2.5 md:w-3 md:h-3 rounded-full bg-white/40 hover:bg-white" data-slide="1"></button>
        <button class="indicator w-2.5 h-2.5 md:w-3 md:h-3 rounded-full bg-white/40 hover:bg-white" data-slide="2"></button>
    </div>
</div>

<script>
    const slides = document.querySelectorAll("#custom-carousel .carousel-item");
    const indicators = document.querySelectorAll(".indicator");
    let current = 0;
    let interval = setInterval(nextSlide, 5000);

    function showSlide(index) {
        slides.forEach((slide, i) => {
            slide.style.opacity = i === index ? "1" : "0";
        });
        indicators.forEach((dot, i) => {
            dot.classList.toggle("bg-white", i === index);
            dot.classList.toggle("bg-white/40", i !== index);
        });
    }

    function nextSlide() {
        current = (current + 1) % slides.length;
        showSlide(current);
    }

    function prevSlide() {
        current = (current - 1 + slides.length) % slides.length;
        showSlide(current);
    }

    document.getElementById("next").addEventListener("click", () => {
        nextSlide();
        resetInterval();
    });

    document.getElementById("prev").addEventListener("click", () => {
        prevSlide();
        resetInterval();
    });

    indicators.forEach(dot => {
        dot.addEventListener("click", e => {
            current = parseInt(e.target.dataset.slide);
            showSlide(current);
            resetInterval();
        });
    });

    function resetInterval() {
        clearInterval(interval);
        interval = setInterval(nextSlide, 5000);
    }

    function scrollToSection(id) {
        const section = document.getElementById(id);
        if (section) section.scrollIntoView({
            behavior: "smooth"
        });
    }

    showSlide(current);
</script>