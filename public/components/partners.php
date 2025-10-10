<section class="max-w-7xl mx-auto bg-yellow-800 text-white overflow-hidden py-8">
   <div id="marquee-wrapper" class="overflow-hidden">
      <div id="marquee" class="flex items-center whitespace-nowrap will-change-transform">
         <img src="images/pertanian.png" alt="PERTANIAN" class="h-16 md:h-20 object-contain" />
         <img src="images/umkm.png" alt="UMKM" class="h-16 md:h-20 object-contain brightness-0 invert" />
         <img src="images/perdagangan.png" alt="PERDAGANGAN" class="h-16 md:h-20 object-contain brightness-0 invert" />
      </div>
   </div>
</section>

<!-- <style>
    #marquee-wrapper {
      width: 100%;
      overflow: hidden;
   } 

   #marquee {
      display: flex;
      gap: 2rem;
      white-space: nowrap;
      will-change: transform;
      transform: translate3d(0, 0, 0);
      backface-visibility: hidden;
   }  *

    #marquee img {
      user-select: none;
      pointer-events: none;
   } 
</style> -->

<script>
   const marquee = document.getElementById("marquee");
   const wrapper = document.getElementById("marquee-wrapper");

   async function waitForImagesLoad(container) {
      const images = container.querySelectorAll("img");
      await Promise.all(
         Array.from(images).map(
            (img) =>
            img.complete ||
            new Promise((resolve) => (img.onload = img.onerror = resolve))
         )
      );
   }

   waitForImagesLoad(marquee).then(() => {
      marquee.querySelectorAll("img").forEach((img) => {
         marquee.appendChild(img.cloneNode(true));
      });

      const marqueeWidth = marquee.scrollWidth / 2;
      let x = 0;
      const speed = 0.08;
      let paused = false;
      let lastTime = performance.now();

      wrapper.addEventListener("mouseenter", () => (paused = true));
      wrapper.addEventListener("mouseleave", () => (paused = false));

      function animate(time) {
         const delta = time - lastTime;
         lastTime = time;

         if (!paused) {
            x -= speed * delta;
            if (x <= -marqueeWidth) x += marqueeWidth;
            marquee.style.transform = `translate3d(${x}px, 0, 0)`;
         }

         requestAnimationFrame(animate);
      }

      requestAnimationFrame(animate);
   });
</script>