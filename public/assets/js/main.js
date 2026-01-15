
// // ===========================
// //     navbar menu active
// // ===========================


// const navLinks = document.querySelectorAll('.nav-link');

// navLinks.forEach(link => {
//   link.addEventListener('click', function () {
//     navLinks.forEach(nav => nav.classList.remove('active'));
//     this.classList.add('active');
//   });
// });


// document.querySelectorAll('.nav-link').forEach(link => {
//   link.addEventListener('click', () => {
//     if (window.innerWidth <= 991) {
//       document.querySelector('.navbar-toggler').click();
//     }
//   });
// });


// window.addEventListener('scroll', () => {
//   const navbar = document.querySelector('.navbar');

//   if (window.scrollY > 160) {
//     navbar.classList.add('fixed-nav');
//   } else {
//     navbar.classList.remove('fixed-nav');
//   }
// });




// // ===========================
// //     start your journey 
// // ===========================

// const openBtn = document.getElementById("openVideo");
// const closeBtn = document.getElementById("closeVideo");
// const modal = document.getElementById("videoModal");
// const iframe = document.getElementById("youtubeFrame");

// const videoURL = "https://www.youtube.com/watch?v=QyhwSYhX09s";

// openBtn.addEventListener("click", () => {
//   modal.classList.add("active");
//   iframe.src = videoURL;
// });

// closeBtn.addEventListener("click", () => {
//   modal.classList.remove("active");
//   iframe.src = ""; // stop video
// });

// // outside click close
// modal.addEventListener("click", (e) => {
//   if (e.target === modal) {
//     modal.classList.remove("active");
//     iframe.src = "";
//   }
// });


// // =======================================
// //      OUR TESTIMONIAL SECTION
// // ======================================
// new Swiper(".testimonialSwiper", {
//   slidesPerView: 1,
//   spaceBetween: 20,
//   loop: true,
//   speed: 800,
//   autoplay: {
//     delay: 1000,                // 1 second pause
//     disableOnInteraction: false,
//     pauseOnMouseEnter: true     // pause on hover
//   },
//   pagination: {
//     el: ".swiper-pagination",
//     clickable: true
//   }
// });


// ===========================
//     navbar menu active
// ===========================

const navLinks = document.querySelectorAll('.nav-link');

if (navLinks.length) {
  navLinks.forEach(link => {
    link.addEventListener('click', function () {
      navLinks.forEach(nav => nav.classList.remove('active'));
      this.classList.add('active');
    });
  });

  navLinks.forEach(link => {
    link.addEventListener('click', () => {
      if (window.innerWidth <= 991) {
        const toggler = document.querySelector('.navbar-toggler');
        if (toggler) toggler.click();
      }
    });
  });
}

// Fixed navbar on scroll
window.addEventListener('scroll', () => {
  const navbar = document.querySelector('.navbar');
  if (!navbar) return;

  if (window.scrollY > 160) {
    navbar.classList.add('fixed-nav');
  } else {
    navbar.classList.remove('fixed-nav');
  }
});


// ===========================
//     start your journey 
// ===========================

const openBtn = document.getElementById("openVideo");
const closeBtn = document.getElementById("closeVideo");
const modal = document.getElementById("videoModal");
const iframe = document.getElementById("youtubeFrame");

if (openBtn && closeBtn && modal && iframe) {

  const videoURL = "https://www.youtube.com/embed/QyhwSYhX09s?autoplay=1";

  openBtn.addEventListener("click", () => {
    modal.classList.add("active");
    iframe.src = videoURL;
  });

  closeBtn.addEventListener("click", () => {
    modal.classList.remove("active");
    iframe.src = "";
  });

  modal.addEventListener("click", (e) => {
    if (e.target === modal) {
      modal.classList.remove("active");
      iframe.src = "";
    }
  });
}


// =======================================
//      OUR TESTIMONIAL SECTION
// ======================================

if (typeof Swiper !== "undefined" && document.querySelector(".testimonialSwiper")) {
  new Swiper(".testimonialSwiper", {
    slidesPerView: 1,
    spaceBetween: 20,
    loop: true,
    speed: 800,
    autoplay: {
      delay: 3000,
      disableOnInteraction: false,
      pauseOnMouseEnter: true
    },
    pagination: {
      el: ".swiper-pagination",
      clickable: true
    }
  });
}
