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
  <a href="https://wa.me/6281234567890" target="_blank"
    class="fixed bottom-10 right-4 md:bottom-8 md:right-12 bg-green-500 hover:bg-green-600 text-white rounded-full w-14 h-14 shadow-lg transition transform hover:scale-110 z-50 flex items-center justify-center">
    <i class="fa-solid fa-headset text-2xl"></i>
  </a>

  <div id="tooltip"
    class="hidden fixed bottom-24 right-6 bg-gray-800 text-white text-sm px-3 py-2 rounded-lg shadow-lg z-40">
    Hubungi Customer Service
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