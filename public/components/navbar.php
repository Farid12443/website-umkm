<section class="max-w-7xl mx-auto">
    <!-- Navbar -->
    <nav class="fixed top-0 left-0 w-full flex items-center justify-between px-8 py-4 md:px-32 bg-white/80 backdrop-blur-md shadow-lg z-50 border-b border-gray-100">
        <!-- Logo -->
        <div class="flex items-center space-x-2">
            <h1 class="text-2xl font-bold text-gray-800">SAESTU ECO</h1>
        </div>

        <!-- Desktop Menu -->
        <ul class="hidden md:flex items-center gap-10 font-medium text-gray-700">
            <li><a href="#" class="hover:text-orange-500 transition-colors duration-200">Home</a></li>
            <li><a href="#" class="hover:text-orange-500 transition-colors duration-200">Produk</a></li>
            <li><a href="#" class="hover:text-orange-500 transition-colors duration-200">Tentang Kami</a></li>
            <li><a href="#testimonial" class="hover:text-orange-500 transition-colors duration-200">Testimmoni</a></li>
        </ul>

        <!-- Desktop Actions -->
        <div class="hidden lg:flex items-center justify-center space-x-6">
            <span class="cursor-pointer hover:text-orange-500 transition-colors duration-200 relative">
                <i class="fa-solid fa-cart-shopping text-gray-700 text-xl"></i>
                <span class="absolute -top-2 -right-2 bg-orange-500 text-white text-xs rounded-full h-5 w-5 flex items-center justify-center">0</span>
            </span>
            <!-- Profile Icon -->
            <div class="relative group">
                <span class="cursor-pointer hover:text-orange-500 transition-colors duration-200">
                    <i class="fa-solid fa-user text-gray-700 text-xl"></i>
                </span>
                <!-- Profile Dropdown (simple hover menu) -->
                <div class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-xl border border-gray-200 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 z-10">
                    <ul class="py-2">
                        <li><a href="../public/profil.php" class="block px-4 py-2 text-gray-700 hover:bg-gray-100 hover:text-orange-500 transition-colors">Profil</a></li>
                        <li><a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100 hover:text-orange-500 transition-colors">Pengaturan</a></li>
                        <li><a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100 hover:text-orange-500 transition-colors">Logout</a></li>
                    </ul>
                </div>
            </div>
            <button class="bg-gradient-to-r from-green-400 to-green-500 text-white font-semibold py-2 px-6 rounded-full hover:from-green-500 hover:to-green-600 transition-all duration-200 shadow-md hover:shadow-lg transform hover:scale-105">Kontak</button>
        </div>

        <!-- Mobile Actions -->
        <div class="flex items-center space-x-4 md:hidden">
            <span class="cursor-pointer hover:text-orange-500 transition-colors duration-200 relative">
                <i class="fa-solid fa-cart-shopping text-gray-700 text-xl"></i>
                <!-- Optional: Cart badge -->
                <span class="absolute -top-1 -right-1 bg-orange-500 text-white text-xs rounded-full h-4 w-4 flex items-center justify-center">0</span>
            </span>
            <!-- Mobile Profile Icon -->
            <!-- Profile Icon -->
            <div class="relative group">
                <span class="cursor-pointer hover:text-orange-500 transition-colors duration-200">
                    <i class="fa-solid fa-user text-gray-700 text-xl"></i>
                </span>
                <!-- Profile Dropdown (simple hover menu) -->
                <div class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-xl border border-gray-200 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 z-10">
                    <ul class="py-2">
                        <li><a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100 hover:text-orange-500 transition-colors">Profil</a></li>
                        <li><a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100 hover:text-orange-500 transition-colors">Pengaturan</a></li>
                        <li><a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100 hover:text-orange-500 transition-colors">Logout</a></li>
                    </ul>
                </div>
            </div>
            <button id="menu-btn" class="text-gray-700 focus:outline-none">
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
    <div id="mobile-menu" class="md:hidden fixed inset-y-0 left-0 w-80 bg-white/95 backdrop-blur-md border-r border-gray-200 shadow-2xl transform -translate-x-full transition-transform duration-300 ease-in-out z-40">
        <div class="flex flex-col h-full">
            <!-- Header with close button -->
            <div class="flex items-center justify-between p-6 border-b border-gray-200 bg-gradient-to-r from-green-50 to-orange-50">
                <h2 class="text-xl font-bold text-gray-800">Menu</h2>
                <button id="close-menu-btn" class="text-gray-600 hover:text-gray-800 focus:outline-none transition-colors duration-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <!-- Menu Items -->
            <ul class="flex-1 flex flex-col space-y-0 py-6 px-4">
                <li><a href="#" class="hover:text-orange-500 px-4 py-4 block border-b border-gray-100 last:border-b-0 text-gray-700 font-medium transition-colors duration-200 hover:bg-gray-50 rounded-lg">Home</a></li>
                <li><a href="#" class="hover:text-orange-500 px-4 py-4 block border-b border-gray-100 last:border-b-0 text-gray-700 font-medium transition-colors duration-200 hover:bg-gray-50 rounded-lg">Produk</a></li>
                <li><a href="#" class="hover:text-orange-500 px-4 py-4 block border-b border-gray-100 last:border-b-0 text-gray-700 font-medium transition-colors duration-200 hover:bg-gray-50 rounded-lg">Tentang Kami</a></li>
                <li><a href="#testimonial" class="hover:text-orange-500 px-4 py-4 block border-b border-gray-100 last:border-b-0 text-gray-700 font-medium transition-colors duration-200 hover:bg-gray-50 rounded-lg">Testimmoni</a></li>
            </ul>

            <!-- Contact Button -->
            <div class="p-4 border-t border-gray-200 space-y-4">
                <button class="bg-green-300 font-semibold py-3 px-6 rounded-full w-full hover:bg-green-400 transition-colors">
                    Kontak
                </button>
            </div>
        </div>
    </div>

    <!-- Overlay Backdrop -->
    <div id="overlay" class="fixed inset-0 z-30 hidden md:hidden bg-black/20 backdrop-blur-sm"></div>
</section>

<script>
    const menuBtn = document.getElementById('menu-btn');
    const closeMenuBtn = document.getElementById('close-menu-btn');
    const mobileMenu = document.getElementById('mobile-menu');
    const overlay = document.getElementById('overlay');

    menuBtn.addEventListener('click', () => {
        mobileMenu.classList.remove('-translate-x-full');
        overlay.classList.remove('hidden');
        document.body.style.overflow = 'hidden';
    });

    closeMenuBtn.addEventListener('click', () => {
        mobileMenu.classList.add('-translate-x-full');
        overlay.classList.add('hidden');
        document.body.style.overflow = 'auto';
    });

    overlay.addEventListener('click', () => {
        mobileMenu.classList.add('-translate-x-full');
        overlay.classList.add('hidden');
        document.body.style.overflow = 'auto';
    });

    menuBtn.addEventListener('click', () => {
        const menuIcon = menuBtn.querySelector('.menu-icon');
        const closeIcon = menuBtn.querySelector('.close-icon');
        menuIcon.classList.toggle('hidden');
        closeIcon.classList.toggle('hidden');
    });
</script>