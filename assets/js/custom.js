document.addEventListener("DOMContentLoaded", function () {
    const video = document.getElementById('home_page_video');
    const videoSrc = video.getAttribute('data-video');
  
    if (videoSrc) {
      video.src = videoSrc;
      video.load(); // ensures the new src is recognized before play()
      video.play().catch((err) => {
        console.warn("Autoplay was blocked:", err);
      });
    } else {
      console.warn("No data-video attribute found.");
    }
  });
  
  // 404 page and redirect after 10 seconds
  if (document.body.classList.contains('error404')) {
      setTimeout(function() {
          window.location.href = jQuery('#home_url').attr('href');
      }, 10000); 
  }
  
  
  // founder page js
  document.addEventListener("DOMContentLoaded", function () {
      var modals = document.querySelectorAll(".recognisable-section .modal");
  
      modals.forEach(function (modal) {
          modal.addEventListener("hidden.bs.modal", function () {
              var iframe = modal.querySelector("iframe");
              if (iframe) {
                  var videoSrc = iframe.src;
                  iframe.src = ""; 
                  iframe.src = videoSrc;
              }
          });
      });
  
      const video = document.getElementById("team_video");
      const muteBtn = document.getElementById("muteBtn");
      const controlsDiv = document.querySelector(".controls");
  
      // Safety check
      if (video && muteBtn && controlsDiv) {
          muteBtn.addEventListener("click", () => {
              video.muted = !video.muted;
              muteBtn.innerHTML = video.muted 
                  ? '<i class="fas fa-volume-mute"></i>' 
                  : '<i class="fas fa-volume-up"></i>';
              controlsDiv.classList.toggle("active-controls");
          });
      } 
  });
  
  document.querySelectorAll('.rll-youtube-player').forEach(function(player) {
      player.remove();
  });
          
  function storeJobTitle(title) {
      // Store the job title in localStorage
      localStorage.setItem('job_title', title);
  }
  
  document.addEventListener('DOMContentLoaded', function () {
      // Retrieve the job title from localStorage
      const jobTitle = localStorage.getItem('job_title');
  
      if (jobTitle) {
          // Find the dropdown element
          const dropdown = document.getElementById('ff_3_dropdown');
  
          // Loop through the options and select the one that matches the job title
          for (let i = 0; i < dropdown.options.length; i++) {
              if (dropdown.options[i].value === jobTitle) {
                  dropdown.selectedIndex = i;
                  break;
              }
          }
  
          // Optionally, you can remove the job title from localStorage after it's used
          localStorage.removeItem('job_title');
      }
  });
  
  document.querySelectorAll('section#current-openings .accordion-button').forEach(button => {
      button.addEventListener('click', function() {
          const parentItem = this.closest('.accordion-item');
  
          if (parentItem.classList.contains('active')) {
              parentItem.classList.remove('active');
          } else {
              document.querySelectorAll('.accordion-item').forEach(item => {
                  item.classList.remove('active');
              });
              parentItem.classList.add('active');
          }
      });
  });
  
  
  jQuery(document).ready(function($) {
      function getQueryParam(param) {
          let urlParams = new URLSearchParams(window.location.search);
          return urlParams.get(param);
      }
  
      let acfFieldValue = getQueryParam('acf_field'); // Get the ACF field value from URL
  
      if (acfFieldValue) {
          $("input[name='input_text_2']").val(acfFieldValue); // Replace with your actual Fluent Form field name
      }
  });
  
  jQuery(document).ready(function() {
      /////////////////////////////all fluent form validation start ////////////////////////// 
    jQuery('input#ff_1_phone, input#ff_8_phone, #ff_3_phone').on('input', function() {
  var maxDigits = 10;  // Set your digit limit here
  var valuedigiti = jQuery(this).val();
  
  // Remove any non-digit characters
  valuedigiti = valuedigiti.replace(/\D/g, '');
  
  // Limit the number of digits
  if (valuedigiti.length > maxDigits) {
    valuedigiti = valuedigiti.slice(0, maxDigits);
  }
  
  // Set the updated value
  jQuery(this).val(valuedigiti);
  });
  ///////////////////////////////////////////////////////////////
  
  ////////////////////////////////////////////////////////////
  jQuery('#ff_1_input_text, #ff_8_input_text').on('input', function() {
  var maxDigits = 50;  // Set your digit limit here
  var valuelast = jQuery(this).val();
  
  // Remove any non-alphabetical characters (only letters and spaces allowed)
  valuelast = valuelast.replace(/[^a-zA-Z ]/g, '');
  
  if (valuelast.length > maxDigits) {
    valuelast = valuelast.slice(0, maxDigits);
  }
  
  // Set the updated value
  jQuery(this).val(valuelast);
  });
      
      jQuery('#ff_1_input_text_1, #ff_3_input_text_1').on('input', function() {
  var maxDigits = 50;  // Set your digit limit here
  var valuelast = jQuery(this).val();
  
  // Remove any non-alphabetical characters (only letters and spaces allowed)
  valuelast = valuelast.replace(/[^a-zA-Z ]/g, '');
  
  if (valuelast.length > maxDigits) {
    valuelast = valuelast.slice(0, maxDigits);
  }
  
  // Set the updated value
  jQuery(this).val(valuelast);
  });
  });
  
  jQuery(document).ready(function () {
     
      jQuery(".video-modal").on("hide.bs.modal", function () {
          var iframe = jQuery(this).find(".youtubeVideo");
          var videoSrc = iframe.data("src");
          iframe.attr("src", videoSrc + "?mute=1&autoplay=0");  // Mute the video
      
      });
      
  });
  
  // Eh
  jQuery(document).ready(function () {
      jQuery('.testimonial-slider').slick({
          slidesToShow: 4.2, 
          slidesToScroll: 1,
          arrows: false,
          dots: false,
          speed: 300,
          infinite: false,
          draggable: true, 
          swipe: true, 
          responsive: [
              {
                  breakpoint: 1200,
                  settings: {
                      slidesToShow: 3.2,
                  }
              },
              {
                  breakpoint: 990,
                  settings: {
                      slidesToShow: 2.2,
                  }
              },
              {
                  breakpoint: 767,
                  settings: "unslick" 
              }
          ]
      });
  });
  
      
  jQuery(document).ready(function () {
      var swiper = new Swiper(".blog-listing-slider", {
          slidesPerView: 4,
          initialSlide: 0,
          spaceBetween: 0,
          centeredSlides: false,
          // 			loop: true,
          navigation: {
              nextEl: ".swiper-button-next",
              prevEl: ".swiper-button-prev",
          },
          breakpoints: {
              340: {
                  slidesPerView: 1.4
              },
              640: {
                  slidesPerView: 2.4
              },
              768: {
                  slidesPerView: 3.5
              },
              1324: {
                  slidesPerView: 4.5
              }
          }
      });
        });
      
  (window.onload = function () {
      var e = document.title,
          t = "Oye! Come Back ;)",
          i = null;
      document.addEventListener("visibilitychange", function (n) {
          document.hidden
              ? (i = setInterval(function () {
                    document.title === t ? (document.title = e) : (document.title = t);
                }, 300))
              : ((document.title = e), clearInterval(i));
      });
  }),
      jQuery(document).ready(function (e) {
          document.addEventListener("DOMContentLoaded", () => {
              let e = document.getElementById("videoModal"),
                  t = document.getElementById("videoFrame");
              e.addEventListener("show.bs.modal", function (e) {
                  let i = e.relatedTarget,
                      n = i.getAttribute("data-video");
                  t.src = n + "?autoplay=1";
              }),
                  e.addEventListener("hidden.bs.modal", function () {
                      t.src = "";
                  });
          });
          let t = ["Advertising Agency", "Website Design", "Content Generation", "Growth Hacking", "WhatsApp Marketing", "SEO and SMO", "Ad Campaigns", "Digital Solutions", "Branding Agency", "Marketing Agency"],
              i = document.querySelector(".text-change"),
              n = new (class e {
                  constructor(e) {
                      (this.el = e), (this.chars = "!<>-_\\/[]{}—=+*^?#________"), (this.update = this.update.bind(this));
                  }
                  setText(e) {
                      let t = this.el.innerText,
                          i = Math.max(t.length, e.length),
                          n = new Promise((e) => (this.resolve = e));
                      this.queue = [];
                      for (let r = 0; r < i; r++) {
                          let a = t[r] || "",
                              s = e[r] || "",
                              o = Math.floor(40 * Math.random()),
                              d = o + Math.floor(40 * Math.random());
                          this.queue.push({ from: a, to: s, start: o, end: d });
                      }
                      return cancelAnimationFrame(this.frameRequest), (this.frame = 0), this.update(), n;
                  }
                  update() {
                      let e = "",
                          t = 0;
                      for (let i = 0, n = this.queue.length; i < n; i++) {
                          let { from: r, to: a, start: s, end: o, char: d } = this.queue[i];
                          this.frame >= o ? (t++, (e += a)) : this.frame >= s ? ((!d || 0.28 > Math.random()) && ((d = this.randomChar()), (this.queue[i].char = d)), (e += `<span class="dud text-dark fw-bold">${d}</span>`)) : (e += r);
                      }
                      (this.el.innerHTML = e), t === this.queue.length ? this.resolve() : ((this.frameRequest = requestAnimationFrame(this.update)), this.frame++);
                  }
                  randomChar() {
                      return this.chars[Math.floor(Math.random() * this.chars.length)];
                  }
              })(i),
              r = 0,
              a = () => {
                  n.setText(t[r]).then(() => {
                      setTimeout(a, 2e3);
                  }),
                      (r = (r + 1) % t.length);
              };
          a();
      }),
  
      // header menu
      jQuery(document).ready(function () {
      jQuery(".head-menu-toggle").click(function () {
          jQuery(".head-menu-toggle, .web-menu-mn, header").toggleClass("menu-active-mn"), 
          jQuery("body").toggleClass("overflow-y-hidden");
      });
  
      jQuery(".head-menu-toggle a").removeAttr("href");
  
      var e = jQuery("html, body");
      jQuery('a[href^="#"]').click(function () {
          return e.animate({ scrollTop: jQuery(jQuery.attr(this, "href")).offset().top }, 500), !1;
      });
  
      // Close menu on ESC key press
      jQuery(document).keydown(function (event) {
          if (event.key === "Escape") {
              jQuery(".head-menu-toggle, .web-menu-mn, header").removeClass("menu-active-mn");
              jQuery("body").removeClass("overflow-y-hidden");
          }
      });
  });
  
      
      // video poster imags
      jQuery(document).ready(function() {
      function playVideo() {
          document.querySelector('.client-journey-video img').style.display = 'none';
          document.querySelector('.play-icon').style.display = 'none';
          document.getElementById('videoContainer').style.display = 'block';
      }
  
  });
  
  