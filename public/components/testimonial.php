<section class="max-w-7xl mx-auto" id="testimonials">
  <div class="relative min-h-[500px] flex items-center justify-center overflow-hidden px-6 py-8 md:px-32">

    <!-- Background Blur Layer -->
    <div
      class="absolute inset-0 bg-[url('https://upload.wikimedia.org/wikipedia/commons/0/0c/Gambar-Pemandangan-Sawah-yang-Indah-.jpg')] bg-cover bg-center z-0">
    </div>

    <!-- Card Testimonial -->
    <div
      class="relative z-20 mx-auto w-full max-w-auto p-8 rounded-xl shadow-2xl text-white text-center bg-green-600/20 backdrop-blur-lg border border-green-400/40">

      <!-- Foto Client -->
      <img
        id="client-photo"
        src="https://source.unsplash.com/100x100/?person"
        alt="Foto Client"
        class="mx-auto mb-4 w-24 h-24 rounded-full border-4 border-orange-500 shadow-md" />

      <!-- Text Testimonial -->
      <p
        id="testimonial-text"
        class="text-white text-md italic text-center mb-4 transition-all duration-500 ease-in-out">
        Ini adalah testimonial dari client. Mereka sangat puas dengan hasil panen yang melimpah berkat produk kami.
      </p>

      <hr class="border-gray-300 mb-4 opacity-60" />

      <!-- Nama Client -->
      <h3 id="client-name" class="font-bold text-lg">John Doe</h3>
    </div>

    <!-- Tombol Panah -->
    <button
      id="prev-button"
      class="absolute left-1 md:left-26 top-1/2 -translate-y-1/2 bg-orange-500 hover:bg-orange-600 p-3 rounded-full z-30 transition-transform hover:scale-110">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="white">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
      </svg>
    </button>

    <button
      id="next-button"
      class="absolute right-1 md:right-26 top-1/2 -translate-y-1/2 bg-orange-500 hover:bg-orange-600 p-3 rounded-full z-30 transition-transform hover:scale-110">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="white">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
      </svg>
    </button>

  </div>
</section>
<!-- Script -->
<script>
  const testimonials = [{
      photo: 'https://source.unsplash.com/100x100/?person1',
      text: 'Saya sangat puas dengan kualitas sayuran yang diperoleh. Panen melimpah dan sehat!',
      name: 'John Doe'
    },
    {
      photo: 'https://source.unsplash.com/100x100/?person2',
      text: 'Produk ini membantu saya meningkatkan hasil panen secara signifikan. Terima kasih!',
      name: 'Jane Smith'
    },
    {
      photo: 'https://source.unsplash.com/100x100/?person3',
      text: 'Sebagai petani, saya merekomendasikan ini untuk semua orang. Mudah dan efektif!',
      name: 'Alex Johnson'
    }
  ];

  let currentIndex = 0;
  const testimonialText = document.getElementById('testimonial-text');
  const clientPhoto = document.getElementById('client-photo');
  const clientName = document.getElementById('client-name');
  const prevButton = document.getElementById('prev-button');
  const nextButton = document.getElementById('next-button');

  function updateTestimonial() {
    testimonialText.textContent = testimonials[currentIndex].text;
    clientPhoto.src = testimonials[currentIndex].photo;
    clientName.textContent = testimonials[currentIndex].name;
  }

  function nextTestimonial() {
    currentIndex = (currentIndex + 1) % testimonials.length;
    updateTestimonial();
  }

  function prevTestimonial() {
    currentIndex = (currentIndex - 1 + testimonials.length) % testimonials.length;
    updateTestimonial();
  }

  nextButton.addEventListener('click', nextTestimonial);
  prevButton.addEventListener('click', prevTestimonial);

  let autoPlayInterval = setInterval(nextTestimonial, 5000);
  prevButton.addEventListener('click', () => clearInterval(autoPlayInterval));
  nextButton.addEventListener('click', () => clearInterval(autoPlayInterval));

  updateTestimonial();
</script>