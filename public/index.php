<!doctype html>
<html>

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>website-umkm</title>

  <!-- load tailwindcss -->
  <link rel="stylesheet" href="css/style.css">

  <!-- load fontawesome -->
  <script src="https://kit.fontawesome.com/1df42cf205.js" crossorigin="anonymous"></script>

  <!-- load google fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Cormorant:ital,wght@0,300..700;1,300..700&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Marmelad&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
  

<body class="bg-[#f9f9f9] font-[roboto]">
  <?php include "components/navbar.php"; ?>
  <?php include "components/home.php"; ?>
  <?php include "components/partners.php"; ?>
  <?php include "components/products.php"; ?>
  <?php include "components/about.php"; ?>
  <?php include "components/testimonial.php"; ?>
  <?php include "components/footer.php"; ?>

  <!-- Tombol WhatsApp -->
  <a href="https://wa.me/6282137472779?text=Halo%20admin,%20saya%20ingin%20bertanya%20mengenai%20Produk%20Anda.
" target="_blank"
    class="fixed bottom-10 right-4 md:bottom-8 md:right-12 bg-[#FFB200] hover:bg-[#c28a08] text-white rounded-full w-14 h-14 shadow-lg transition transform hover:scale-110 z-50 flex items-center justify-center">
    <i class="fa-solid fa-headset text-2xl"></i>
  </a>

  <div id="tooltip"
    class="hidden fixed bottom-24 right-6 bg-gray-800 text-white text-sm px-3 py-2 rounded-lg shadow-lg z-40">
    Hubungi Customer Service
  </div>

  <!-- Overlay -->
<div id="waModal" class="fixed inset-0 bg-black/50 backdrop-blur-sm hidden justify-center items-center z-50">
    
    <!-- Modal Box -->
    <div id="modalBox"
         class="bg-white w-11/12 md:w-1/3 p-6 rounded-2xl shadow-xl scale-0 opacity-0 transition-all duration-300">
        
        <h2 class="text-xl font-semibold mb-4 text-gray-700">Hubungi Admin</h2>

        <div class="flex flex-col gap-3">
            <div>
                <label class="text-sm text-gray-600">Nama</label>
                <input 
                    id="waName" 
                    type="text" 
                    class="w-full border rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-green-400"
                    placeholder="Nama kamu..."
                >
            </div>

            <div>
                <label class="text-sm text-gray-600">Pesan</label>
                <textarea 
                    id="waMessage" 
                    rows="4" 
                    class="w-full border rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-green-400"
                    placeholder="Tulis pesan kamu..."
                ></textarea>
            </div>
        </div>

        <!-- Button -->
        <div class="flex justify-end gap-3 mt-5">
            <button onclick="closeModal()" class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition">
                Batal
            </button>

            <button onclick="sendToWA()" class="px-4 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600 transition">
                Kirim
            </button>
        </div>
    </div>
</div>



  <script>
    const btn = document.querySelector('a[href*="wa.me"]');
    const tooltip = document.getElementById('tooltip');

    btn.addEventListener('mouseenter', () => tooltip.classList.remove('hidden'));
    btn.addEventListener('mouseleave', () => tooltip.classList.add('hidden'));
  </script>

  <!-- <script src="js/script.js"></script> -->
</body>

</html>