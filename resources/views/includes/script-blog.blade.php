<script src="https://assets.okriiza.my.id/themes/frontend/assets/libraries/jquery/jquery-3.5.1.slim.min.js"></script>
<script src="https://assets.okriiza.my.id/themes/frontend/assets/libraries/bootstrap/js/bootstrap.min.js"></script>
<script src="https://assets.okriiza.my.id/themes/frontend/assets/script/main.js"></script>
   <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TKGVTN5"
   height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
   <!-- End Google Tag Manager (noscript) -->

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-93821119-2"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-93821119-2');
</script>


<!-- Google Analytics -->
<script>
   (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
   (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
   m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
   })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
   
   ga('create', 'UA-93821119-2', 'auto');
   ga('send', 'pageview');
   </script>
   <!-- End Google Analytics -->
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