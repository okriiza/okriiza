<script src="https://assets.okriiza.my.id/themes/frontend/assets/libraries/jquery/jquery-3.5.1.slim.min.js"></script>
<script src="https://assets.okriiza.my.id/themes/frontend/assets/libraries/bootstrap/js/bootstrap.min.js"></script>
<script src="https://assets.okriiza.my.id/themes/frontend/assets/script/main.js"></script>

<script>
   
   // back to top
   const scrollToTopButton = document.getElementById('js-top');
      const scrollFunc = () => {
         let y = window.scrollY;
         if (y > 0) {
            scrollToTopButton.className = "top-link show";
         } else {
            scrollToTopButton.className = "top-link hide";
         }
      };

      window.addEventListener("scroll", scrollFunc);

      const scrollToTop = () => {
         const c = document.documentElement.scrollTop || document.body.scrollTop;
         if (c > 0) {
            window.requestAnimationFrame(scrollToTop);
            window.scrollTo(0, c - c / 10);
         }
      };

      scrollToTopButton.onclick = function (e) {
         e.preventDefault();
         scrollToTop();
      }

</script>