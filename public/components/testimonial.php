<?php

$testimonials = [
  ['name' => 'lorem', 'addres' => 'lorem', 'star' => '⭐⭐⭐⭐⭐', 'description' => 'loreme'],
  ['name' => 'lorem', 'addres' => 'lorem', 'star' => '⭐⭐⭐⭐⭐', 'description' => 'loreme'],
  ['name' => 'lorem', 'addres' => 'lorem', 'star' => '⭐⭐⭐⭐⭐', 'description' => 'loreme'],
  ['name' => 'lorem', 'addres' => 'lorem', 'star' => '⭐⭐⭐⭐⭐', 'description' => 'loreme'],
  ['name' => 'lorem', 'addres' => 'lorem', 'star' => '⭐⭐⭐⭐⭐', 'description' => 'loreme']
];

?>


<section class="max-w-7xl mx-auto px-8 py-12 md:px-32" id="testimonial">

  <!-- Judul -->
  <div class="flex flex-col gap-6 max-w-2xl mb-8">
    <h1 class="text-4xl md:text-5xl font-bold text-black">Testimonial</h1>
    <p class="text-lg md:text-xl font-light text-gray-700">
      Beras premium pilihan, dipanen segar dan diolah higienis untuk keluarga Anda.
    </p>
  </div>

  <div class="flex gap-6 overflow-x-auto pb-4 scrollbar-hide">

    <?php foreach ($testimonials as $item) { ?>
      <!-- Card 1 -->
      <div class="flex-shrink-0 w-[500px] flex items-center border rounded-2xl p-3 shadow-sm hover:shadow-md transition bg-white">
        <img src="https://asset.kompas.com/crops/uWy9sjOHu_N21k29z9PxyS63OPg=/0x0:1000x667/1200x800/data/photo/2022/05/04/6271c5c7d49c9.jpg"
          alt="Foto Udin"
          class="w-20 h-20 rounded-full object-cover mr-6">
        <div class="flex-1">
          <div class="flex justify-between items-start mb-2">
            <div>
              <span class="block font-semibold text-gray-900">Udin</span>
              <span class="text-sm text-gray-500">Suruh, Semarang</span>
            </div>
            <div class="text-yellow-500">⭐⭐⭐⭐⭐</div>
          </div>
          <p class="text-gray-700 text-sm md:text-base">
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Esse, laudantium.
          </p>
        </div>

      </div>
    <?php } ?>
  </div>
</section>