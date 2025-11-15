<div class="relative py-16 px-8 md:px-32 rounded-2xl">
    <div class="text-start mb-16">
        <h2 class="text-3xl md:text-4xl font-bold text-green-800 mb-4 leading-tight">Proses Produksi</h2>
    </div>

    <div class="relative mx-auto space-y-12">
        <div class="hidden md:block absolute left-1/2 top-0 h-full w-1 bg-gray-300 transform -translate-x-1/2 z-0"></div>
        <div class="absolute md:hidden flex flex-col items-center left-0 top-0 h-full z-0">
            <div class="w-1 bg-gray-300 flex-1"></div>
        </div>

        <!-- pemilaihan -->
        <div class="relative flex flex-col md:flex-row md:justify-between md:items-center">

            <div class="absolute hidden md:block left-1/2 transform -translate-x-1/2 bg-green-500 w-6 h-6 rounded-full border-4 border-white shadow-md z-10"></div>
            <div class="absolute md:hidden flex flex-col items-center left-0 top-0 h-full z-10">
                <div class="absolute top-1/2 -translate-y-1/2 bg-green-500 w-5 h-5 rounded-full border-4 border-white shadow-md"></div>
            </div>

            <div class="md:w-5/12 w-full md:text-right md:pr-8 md:order-1 order-2 pl-6">
                <div class="md:hidden flex flex-col bg-white rounded-2xl shadow-md p-6 w-full"> <!-- Card untuk mobile -->
                    <img src="images/pemilihan.png" alt="Pemilihan Gabah" class="w-full h-28 rounded-xl object-cover shadow-md self-start">
                    <div class="mt-4">
                        <h3 class="text-xl font-semibold text-gray-900">Pemilihan Gabah</h3>
                        <p class="text-gray-600 mt-2">Gabah berkualitas dipilih langsung dari petani terbaik untuk memastikan hasil beras premium.</p>
                    </div>
                </div>
                <div class="hidden md:block"> <!-- Konten desktop saja -->
                    <h3 class="text-2xl font-semibold text-gray-800 mb-3">Pemilihan Gabah</h3>
                    <p class="text-gray-600">Gabah berkualitas dipilih langsung dari petani terbaik untuk memastikan hasil beras premium.</p>
                </div>
            </div>

            <!-- Gambar (desktop: kanan; mobile: sudah diintegrasikan di card) -->
            <div class="md:w-5/12 w-full mt-6 md:mt-0 md:order-2 order-1 md:ml-8">
                <div class="hidden md:block"> <!-- Gambar desktop saja -->
                    <img src="images/pemilihan.png" alt="Pemilihan Gabah" class="w-full rounded-2xl shadow-md">
                </div>
            </div>
        </div>

        <!-- Langkah 2: Pengeringan -->
        <div class="relative flex flex-col-reverse md:flex-row md:justify-between md:items-center"> <!-- flex-col-reverse untuk mobile agar gambar di atas -->
            <!-- Titik timeline (sama seperti atas) -->
            <div class="absolute hidden md:block left-1/2 transform -translate-x-1/2 bg-green-500 w-6 h-6 rounded-full border-4 border-white shadow-md z-10"></div>
            <div class="absolute md:hidden flex flex-col items-center left-0 top-0 h-full z-10">
                <div class="absolute top-1/2 -translate-y-1/2 bg-green-500 w-5 h-5 rounded-full border-4 border-white shadow-md"></div>
            </div>

            <!-- Gambar (desktop: kiri; mobile: di card) -->
            <div class="md:w-5/12 w-full mt-6 md:mt-0 md:order-1 order-1">
                <div class="hidden md:block"> <!-- Gambar desktop saja -->
                    <img src="images/pengeringan.png" alt="Pengeringan" class="w-full rounded-2xl shadow-md">
                </div>
            </div>

            <!-- Konten (desktop: kanan, pl-8; mobile: card dengan gambar kecil di atas) -->
            <div class="md:w-5/12 w-full md:pl-8 md:order-2 order-2 pl-6">
                <div class="md:hidden flex flex-col bg-white rounded-2xl shadow-md p-6 w-full"> <!-- Card untuk mobile -->
                    <img src="images/pengeringan.png" alt="Pengeringan" class="w-full h-28 rounded-xl object-cover shadow-md self-start">
                    <div class="mt-4">
                        <h3 class="text-xl font-semibold text-gray-900">Pengeringan</h3>
                        <p class="text-gray-600 mt-2">Gabah dikeringkan dengan suhu optimal agar kadar air tetap terjaga dan tidak rusak.</p>
                    </div>
                </div>
                <div class="hidden md:block"> <!-- Konten desktop saja -->
                    <h3 class="text-2xl font-semibold text-gray-800 mb-3">Pengeringan</h3>
                    <p class="text-gray-600">Gabah dikeringkan dengan suhu optimal agar kadar air tetap terjaga dan tidak rusak.</p>
                </div>
            </div>
        </div>

        <!-- Langkah 3: Penggilingan -->
        <div class="relative flex flex-col md:flex-row md:justify-between md:items-center">
            <!-- Titik timeline (sama seperti atas) -->
            <div class="absolute hidden md:block left-1/2 transform -translate-x-1/2 bg-green-500 w-6 h-6 rounded-full border-4 border-white shadow-md z-10"></div>
            <div class="absolute md:hidden flex flex-col items-center left-0 top-0 h-full z-10">
                <div class="absolute top-1/2 -translate-y-1/2 bg-green-500 w-5 h-5 rounded-full border-4 border-white shadow-md"></div>
            </div>

            <!-- Konten (desktop: kiri, text-right; mobile: card) -->
            <div class="md:w-5/12 w-full md:text-right md:pr-8 md:order-1 order-2 pl-6">
                <div class="md:hidden flex flex-col bg-white rounded-2xl shadow-md p-6 w-full"> <!-- Card untuk mobile -->
                    <img src="images/penggilingan.png" alt="Penggilingan" class="w-full h-28 rounded-xl object-cover shadow-md self-start">
                    <div class="mt-4">
                        <h3 class="text-xl font-semibold text-gray-900">Penggilingan</h3>
                        <p class="text-gray-600 mt-2">Proses penggilingan dilakukan dengan mesin modern untuk menghasilkan beras yang bersih dan utuh.</p>
                    </div>
                </div>
                <div class="hidden md:block"> <!-- Konten desktop saja -->
                    <h3 class="text-2xl font-semibold text-gray-800 mb-3">Penggilingan</h3>
                    <p class="text-gray-600">Proses penggilingan dilakukan dengan mesin modern untuk menghasilkan beras yang bersih dan utuh.</p>
                </div>
            </div>

            <!-- Gambar (desktop: kanan; mobile: di card) -->
            <div class="md:w-5/12 w-full mt-6 md:mt-0 md:order-2 order-1 md:ml-8">
                <div class="hidden md:block"> <!-- Gambar desktop saja -->
                    <img src="images/penggilingan.png" alt="Penggilingan" class="w-full rounded-2xl shadow-md">
                </div>
            </div>
        </div>
    </div>
</div>