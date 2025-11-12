<section class="max-w-7xl mx-auto" id="home-section">
    <div class="flex flex-col mt-12 md:flex-row md:mt-8 items-center justify-between px-8 pt-18 md:pb-0 md:px-32 rounded-2xl">
        <!-- Teks -->
        <div class="md:w-1/2 space-y-4 flex flex-col justify-between">
            <h2 class="text-5xl text-left font-bold text-black">
                Tingkatkan kualitas masakan Anda dengan beras pilihan.
            </h2>

            <div class="rounded-md  flex flex-col justify-between gap-3">
                <p class="text-2xl text-left font-medium text-gray-700">
                    Dari petani lokal, langsung ke meja makan Anda. Nikmati beras pilihan yang pulen, sehat, dan terjangkau — diproses dengan teliti oleh petani berpengalaman.
                </p>
                <button class="px-6 py-2 w-50 bg-[#FFA600] text-white rounded-lg shadow hover:bg-orange-600 transition">
                    Selengkapnya
                </button>

            </div>
        </div>

        <div class="relative flex justify-center items-center pt-12 md:pt-0">
            <!-- Lingkaran highlight -->
            <div class="absolute w-90 h-90 bg-yellow-200 rounded-full blur-3xl opacity-100 z-0"></div>

            <!-- Gambar utama -->
            <div class="gambar relative z-10">
                <img src="images/beras.png" alt="Gambar" class="w-full max-w-sm object-cover sm:block">
            </div>

            <!-- Floating Badges -->
            <div class="absolute top-3 right-0 bg-white/70 border border-white/40 shadow-lg px-5 py-3 rounded-2xl flex items-center gap-3 animate-[float_3.5s_ease-in-out_infinite_0.5s] z-20">
                <i class="fa-solid fa-seedling text-green-500 text-lg"></i>
                <p class="text-gray-700 font-semibold text-sm">Proses Alami & Sehat</p>
            </div>

            <div class="absolute bottom-12 right-0 bg-white/70 border border-white/40 shadow-lg px-5 py-3 rounded-2xl flex items-center gap-3 animate-[float_3.5s_ease-in-out_infinite_2s] z-20">
                <i class="fa-solid fa-leaf text-green-600 text-lg"></i>
                <p class="text-gray-700 font-semibold text-sm">Ramah Lingkungan</p>
            </div>

            <div class="absolute top-1/2 left-0 bg-white/70 border border-white/40 shadow-lg px-5 py-3 rounded-2xl flex items-center gap-3 animate-[float_3.5s_ease-in-out_infinite_1s] z-20">
                <i class="fa-solid fa-tractor text-orange-500 text-lg"></i>
                <p class="text-gray-700 font-semibold text-sm">Dari Petani Terpercaya</p>
            </div>

        </div>

    </div>
</section>

<style>
    @keyframes float {

        0%,
        100% {
            transform: translateY(0);
        }

        50% {
            transform: translateY(-10px);
        }
    }
</style>