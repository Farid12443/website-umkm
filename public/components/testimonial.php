<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Testimonial Petani</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <!-- SwiperJS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
  <style>
    .bg-overlay {
      background: linear-gradient(rgba(0,0,0,0.3), rgba(0,0,0,0.3)), 
                  url('https://images.unsplash.com/photo-1501004318641-b39e6451bec6?auto=format&fit=crop&w=1500&q=80');
      background-size: cover;
      background-position: center;
    }
  </style>
</head>
<body class="bg-gray-100">

  <!-- Testimonial Section -->
  <section class="bg-overlay flex items-center justify-center min-h-screen relative">
    <div class="swiper w-full max-w-4xl">
      <div class="swiper-wrapper">

        <!-- Slide 1 -->
        <div class="swiper-slide flex flex-col md:flex-row items-center justify-center gap-8">
          <img src="https://i.ibb.co/T8tF6ZW/farmer-woman.png" alt="Petani" class="hidden md:block w-56 object-contain">
          
          <div class="bg-green-600 bg-opacity-80 text-white p-10 rounded-lg text-center max-w-lg">
            <div class="flex justify-center mb-4">
              <img src="https://i.ibb.co/b6RwT2X/client1.jpg" class="w-20 h-20 rounded-full border-4 border-white" alt="Client">
            </div>
            <p class="text-lg italic mb-4">
              “Dolores sed duo clita justo dolor et stet lorem kasd dolore lorem ipsum. At lorem lorem magna ut et, nonumy labore diam erat.”
            </p>
            <h3 class="font-bold text-xl">Client Name</h3>
          </div>

          <img src="https://i.ibb.co/z7NZywx/farmer-man.png" alt="Petani" class="hidden md:block w-56 object-contain">
        </div>

        <!-- Slide 2 -->
        <div class="swiper-slide flex flex-col md:flex-row items-center justify-center gap-8">
          <img src="https://i.ibb.co/T8tF6ZW/farmer-woman.png" alt="Petani" class="hidden md:block w-56 object-contain">
          
          <div class="bg-green-600 bg-opacity-80 text-white p-10 rounded-lg text-center max-w-lg">
            <div class="flex justify-center mb-4">
              <img src="https://i.ibb.co/b6RwT2X/client2.jpg" class="w-20 h-20 rounded-full border-4 border-white" alt="Client">
            </div>
            <p class="text-lg italic mb-4">
              “Erat dolor rebum sit ipsum. Lorem magna ut et, nonumy labore diam erat lorem kasd dolore lorem ipsum.”
            </p>
            <h3 class="font-bold text-xl">Client Dua</h3>
          </div>

          <img src="https://i.ibb.co/z7NZywx/farmer-man.png" alt="Petani" class="hidden md:block w-56 object-contain">
        </div>

      </div>

      <!-- Navigasi -->
      <div class="swiper-button-next text-white"></div>
      <div class="swiper-button-prev text-white"></div>
    </div>

    <!-- Tombol ke atas -->
    <a href="#" class="fixed bottom-6 right-6 bg-orange-500 text-white p-3 rounded-full shadow-lg hover:bg-orange-600 transition">
      ↑
    </a>
  </section>

  <!-- SwiperJS -->
  <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
  <script>
    const swiper = new Swiper('.swiper', {
      loop: true,
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
    });
  </script>
</body>
</html>
