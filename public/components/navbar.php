<section class="max-w-7xl mx-auto">
    <!-- Navbar -->
    <nav class="fixed top-0 left-0 w-full flex items-center justify-between px-8 py-4 md:px-32 bg-[#f9f9f9] z-50">
        <!-- Logo -->
        <div class="flex items-center space-x-2">
            <h1 class="text-2xl font-bold">SAESTU ECO</h1>
        </div>

        <!-- Desktop Menu -->
        <ul class="hidden md:flex items-center gap-10 font-medium text-gray-800">
            <li><a href="#" class="hover:text-orange-500">Home</a></li>
            <li><a href="#" class="hover:text-orange-500">Produk</a></li>
            <li><a href="#" class="hover:text-orange-500">Tentang Kami</a></li>
            <li><a href="#testimonial" class="hover:text-orange-500">Testimmoni</a></li>
        </ul>

        <!-- Desktop Actions -->
        <div class="hidden lg:flex items-center space-x-8">
            <button class="bg-green-300 font-semibold py-2 px-6 rounded-full hover:bg-green-400 transition-colors">Kontak</button>
            <span class="cursor-pointer hover:text-orange-500 transition-colors">
                <i class="fa-solid fa-cart-shopping"></i>
            </span>
        </div>

        <!-- Mobile Actions -->
        <div class="flex items-center space-x-2 md:hidden">
            <span class="cursor-pointer hover:text-orange-500 transition-colors">
                <i class="fa-solid fa-cart-shopping"></i>
            </span>
            <button id="menu-btn" class="text-gray-800 focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 menu-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 close-icon hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    </nav>

    <!-- Mobile Sidebar Menu (Slide from left) -->
    <div id="mobile-menu" class="md:hidden fixed inset-y-0 left-0 w-80 bg-[#f9f9f9] border-r border-gray-200 shadow-xl transform -translate-x-full transition-transform duration-300 ease-in-out z-40">
        <div class="flex flex-col h-full">
            <!-- Header with close button -->
            <div class="flex items-center justify-between p-4 border-b border-gray-200">
                <h2 class="text-xl font-bold">Menu</h2>
                <button id="close-menu-btn" class="text-gray-800 focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <!-- Menu Items -->
            <ul class="flex-1 flex flex-col space-y-0 py-6 px-4">
                <li><a href="#" class="hover:text-orange-500 px-4 py-3 block border-b border-gray-100 last:border-b-0">Home</a></li>
                <li><a href="#" class="hover:text-orange-500 px-4 py-3 block border-b border-gray-100 last:border-b-0">Produk</a></li>
                <li><a href="#" class="hover:text-orange-500 px-4 py-3 block border-b border-gray-100 last:border-b-0">Tentang Kami</a></li>
                <li><a href="#testimonial" class="hover:text-orange-500 px-4 py-3 block border-b border-gray-100 last:border-b-0">Testimmoni</a></li>
            </ul>

            <!-- Actions -->
            <div class="p-4 border-t border-gray-200 space-y-4">
                <button class="bg-green-300 font-semibold py-3 px-6 rounded-full w-full hover:bg-green-400 transition-colors">Kontak</button>
                <a href="#" class="flex items-center justify-center space-x-2 text-gray-800 hover:text-orange-500 transition-colors">
                    <i class="fa-solid fa-cart-shopping"></i>
                    <span>Keranjang</span>
                </a>
            </div>
        </div>
    </div>

    <!-- Overlay Backdrop -->
    <div id="overlay" class="fixed inset-0 bg-black bg-opacity-50 z-30 hidden md:hidden"></div>
</section>