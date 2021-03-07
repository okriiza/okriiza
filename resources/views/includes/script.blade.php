<script src="{{ url('themes/frontend/assets/libraries/jquery/jquery-3.5.1.slim.min.js')}}"></script>
<script src="{{ url('themes/frontend/assets/libraries/jquery/popper.min.js')}}"></script>
<script src="{{ url('themes/frontend/assets/libraries/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{ url('themes/frontend/assets/script/main.js')}}"></script>
<script src="{{ url('themes/frontend/assets/libraries/aos/js/aos.js')}}"></script>
<script src="{{ url('themes/frontend/assets/libraries/magnific-popup/jquery.magnific-popup.min.js') }}"></script>
<script>
   // navbar
   // $(window).scroll(function() {
   //    if($(this).scrollTop()>5) {
   //       $( ".navbar-me" ).removeClass("border-bottom");
   //    } else {
   //       $( ".navbar-me" ).addClass("border-bottom");
   //    }
   // });

   // lazy loading
   

   //text type
   var TxtRotate = function(el, toRotate, period) {
   this.toRotate = toRotate;
   this.el = el;
   this.loopNum = 0;
   this.period = parseInt(period, 10) || 2000;
   this.txt = '';
   this.tick();
   this.isDeleting = false;
   };

   TxtRotate.prototype.tick = function() {
   var i = this.loopNum % this.toRotate.length;
   var fullTxt = this.toRotate[i];

   if (this.isDeleting) {
      this.txt = fullTxt.substring(0, this.txt.length - 1);
   } else {
      this.txt = fullTxt.substring(0, this.txt.length + 1);
   }

   this.el.innerHTML = '<span class="wrap">'+this.txt+'</span>';

   var that = this;
   var delta = 300 - Math.random() * 100;

   if (this.isDeleting) { delta /= 2; }

   if (!this.isDeleting && this.txt === fullTxt) {
      delta = this.period;
      this.isDeleting = true;
   } else if (this.isDeleting && this.txt === '') {
      this.isDeleting = false;
      this.loopNum++;
      delta = 500;
   }

   setTimeout(function() {
      that.tick();
   }, delta);
   };

   window.onload = function() {
   var elements = document.getElementsByClassName('txt-rotate');
   for (var i=0; i<elements.length; i++) {
      var toRotate = elements[i].getAttribute('data-rotate');
      var period = elements[i].getAttribute('data-period');
      if (toRotate) {
         new TxtRotate(elements[i], JSON.parse(toRotate), period);
      }
   }
   // INJECT CSS
   var css = document.createElement("style");
   css.type = "text/css";
   css.innerHTML = ".txt-rotate > .wrap { border-right: 0.08em solid #666; font-size: 30px }";
   document.body.appendChild(css);
   };

   // AOS
   AOS.init();

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
<script>
   $(document).ready(function() {
      // Pop Up Image Project
      $('.project-image-popup').magnificPopup({
         delegate: 'a',
         type: 'image'
      // other options
      });
   });
   
</script>