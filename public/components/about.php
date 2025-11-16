<section class="max-w-7xl mx-auto bg-white" id="about-section">
    <div class="flex flex-col md:flex-col justify-between px-8 py-8 md:px-32 rounded-2xl">
        <div class="flex flex-col justify-between items-center gap-4 max-w-[600px] mx-auto text-center py-12">
            <h1 class="text-5xl font-bold text-black">
                Tentang Kami
            </h1>
            <p class="text-xl font-light text-black">
                Menghadirkan beras berkualitas dari petani lokal dengan semangat menjaga cita rasa dan kesejahteraan bersama.
            </p>
        </div>
        <div class="flex flex-col py-2 md:flex-row items-center justify-between gap-8 rounded-2xl ">
            <!-- Gambar -->
            <div class="flex-1 flex ">
                <img src="images/gambar.png"
                    alt="Gambar"
                    class="w-full max-w-sm object-cover rounded-xl">
            </div>

            <!-- Teks -->
            <div class="flex-1 text-gray-700 space-y-4">
                <h2 class="text-amber-600 text-2xl md:text-5xl font-bold uppercase tracking-wide">Siapa Kami?</h2>
                <p class="leading-relaxed text-justify md:text-lg">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Officia, omnis accusamus
                    tempora praesentium assumenda qui obcaecati repudiandae magnam adipisci sapiente quisquam
                    nam sunt, ipsam animi consectetur expedita ipsa, quia perspiciatis temporibus quam mollitia!
                </p>
                <button id="show-about"
                    class="inline-block px-5 py-2 bg-[#FFA600] text-white rounded-lg shadow hover:bg-[#eaa21c] transition">
                    Selengkapnya
                </button>
            </div>
        </div>
    </div>
    <div class="mx-auto bg-[#ffb300c1] text-white overflow-hidden py-7">
        <div class="flex flex-col md:flex-row items-center justify-around max-w-6xl mx-auto text-center gap-8">
            <div>
                <h2 class="text-4xl font-bold">15<span class="text-[#C38C0B]">+</span></h2>
                <p class="text-sm opacity-90 mt-2">Tahun Pengalaman Petani</p>
            </div>
            <div>
                <h2 class="text-4xl font-bold">2,500<span class="text-[#C38C0B]">+</span></h2>
                <p class="text-sm opacity-90 mt-2">Pelanggan Puas</p>
            </div>
            <div>
                <h2 class="text-4xl font-bold">50<span class="text-[#C38C0B]">+</span></h2>
                <p class="text-sm opacity-90 mt-2">Mitra Tani Aktif</p>
            </div>
            <div>
                <h2 class="text-4xl font-bold">10,000<span class="text-[#C38C0B]">+</span></h2>
                <p class="text-sm opacity-90 mt-2">Karung Beras Terjual</p>
            </div>
        </div>
    </div>

</section>

<section class="max-w-7xl mx-auto bg-[#f5f2e7] hidden pt-18" id="full-about-section">
    <?php include "components/carousel.php"; ?>
    <div class="flex flex-col md:flex-col justify-between">
        <!-- tentang kami -->
        <?php include "components/aboutsection.php"; ?>

        <!-- visi & misi -->
        <?php include "components/visimisi.php"; ?>

        <!-- keunggulan -->
        <?php include "components/keunggulan.php"; ?>

        <!-- proses -->
        <?php include "components/proses.php"; ?>

        <!-- lokasi & kontak -->
        <?php include "components/lokasi.php"; ?>
    </div>
</section>

<script>
    // tampilkan full about
    document.getElementById("show-about").addEventListener("click", function() {
        const sectionIds = [
            "home-section",
            "products-section",
            "suports-section",
            "about-section",
            "testimonial"
        ];

        sectionIds.forEach(id => {
            const el = document.getElementById(id);
            if (el) el.style.display = "none";
        });

        const aboutFull = document.getElementById("full-about-section");
        if (aboutFull) {
            aboutFull.style.display = "block";
            window.scrollTo(0, 0); // langsung tampil di atas halaman
        }
    });

    // sembunyikan full abot
    document.getElementById("back-home").addEventListener("click", function() {
        const sectionIds = [
            "home-section",
            "products-section",
            "suports-section",
            "about-section",
            "testimonial"
        ];


        sectionIds.forEach(id => {
            const el = document.getElementById(id);
            if (el) el.style.display = "block";
        });


        const aboutFull = document.getElementById("full-about-section");
        if (aboutFull) aboutFull.style.display = "none";

        const about = document.getElementById("about-section");
        if (about) {
            about.scrollIntoView({
                behavior: "instant",
                block: "start"
            });
        }
    });
</script>