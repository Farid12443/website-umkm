<section
  class="max-w-7xl mx-auto bg-cover bg-center min-h-screen flex items-center justify-center relative"
  style="background-image: url('https://www.shutterstock.com/image-photo/rice-fields-morning-light-rural-600nw-2400505983.jpg');"
  aria-label="Section Testimonial">

  <div class="flex flex-col justify-center items-center px-8 md:px-32 w-full max-w-7xl">
    <!-- Judul -->
    <div class="flex flex-col gap-6 max-w-2xl mb-12 mx-auto text-center">
      <h1 class="text-4xl md:text-5xl font-bold text-black drop-shadow-md">Testimonial</h1>
      <p class="text-lg md:text-xl font-light text-gray-800">
        Beras premium pilihan, dipanen segar dan diolah higienis untuk keluarga Anda.
      </p>
    </div>

    <!-- Wrapper untuk Card dan Tombol Navigasi -->
    <div class="relative w-full max-w-3xl mx-auto">
      <!-- Testimonial Card -->
      <div
        class="relative bg-green-700/70 text-white p-8 md:p-10 rounded-xl mx-auto text-center shadow-lg backdrop-blur-md transition-all duration-300 hover:shadow-2xl">
        <!-- Gambar profil -->
        <div class="flex justify-center mb-6">
          <div class="border-4 border-orange-400 rounded-full p-1 shadow-md">
            <img
              src="https://randomuser.me/api/portraits/men/32.jpg"
              alt="Foto profil client"
              class="w-24 h-24 rounded-full object-cover"
              loading="lazy">
          </div>
        </div>

        <!-- Teks testimonial -->
        <p class="text-lg md:text-xl leading-relaxed mb-6 italic text-gray-100">
          "Dolores sed duo clita justo dolor et stet lorem kasd dolore lorem ipsum. At lorem lorem magna ut et, nonumy labore diam erat. Erat dolor rebum sit ipsum."
        </p>

        <!-- Nama client -->
        <h3 class="font-semibold text-xl md:text-2xl text-orange-300 border-t border-white/50 pt-4">
          Client Name
        </h3>

        <!-- Indikator Testimonial (opsional, untuk UX lebih baik) -->
        <div class="flex justify-center mt-6 space-x-2">
          <button class="w-3 h-3 rounded-full bg-white/50 hover:bg-white transition-all" aria-label="Testimonial 1" role="button"></button>
          <button class="w-3 h-3 rounded-full bg-white/20 hover:bg-white transition-all" aria-label="Testimonial 2" role="button"></button>
          <button class="w-3 h-3 rounded-full bg-white/20 hover:bg-white transition-all" aria-label="Testimonial 3" role="button"></button>
        </div>
      </div>

      <!-- Tombol Navigasi, diposisikan relatif ke card wrapper -->
      <button
        class="absolute left-0 md:left-0 top-1/2 transform -translate-y-1/2 bg-white text-green-700 p-3 rounded-full shadow-md hover:bg-green-600 hover:text-white hover:scale-110 active:scale-95 transition-all duration-300 ease-in-out"
        aria-label="Previous testimonial"
        role="button">
        &#8592;
      </button>

      <button
        class="absolute right- md:right-0 top-1/2 transform -translate-y-1/2 bg-white text-green-700 p-3 rounded-full shadow-md hover:bg-green-600 hover:text-white hover:scale-110 active:scale-95 transition-all duration-300 ease-in-out"
        aria-label="Next testimonial"
        role="button">
        &#8594;
      </button>
    </div>
  </div>
</section>