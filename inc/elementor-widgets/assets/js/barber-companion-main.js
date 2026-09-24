/**
 * Barber Companion widgets without jQuery: carousels, the portfolio filter,
 * scroll-to-top and counters, on the ColorlibUI bundle the Barber theme loads.
 * Runs at DOM ready so it works whichever order the scripts are printed in.
 */
(function () {
  'use strict';

  function run() {
    var UI = window.ColorlibUI;
    if (!UI) return;

    UI.owl('.hero-slides', {
      items: 1,
      loop: true,
      autoplay: true,
      smartSpeed: 800,
      margin: 0,
      dots: false,
      nav: true,
      navText: ['<i class="fa-solid fa-chevron-left" aria-hidden="true"></i>', '<i class="fa-solid fa-chevron-right" aria-hidden="true"></i>']
    });

    UI.owl('.barber-service-slides', {
      items: 3,
      loop: true,
      autoplay: true,
      smartSpeed: 800,
      margin: 30,
      center: true,
      dots: false,
      nav: true,
      startPosition: 1,
      navText: ['<i class="fa-solid fa-chevron-left" aria-hidden="true"></i>', '<i class="fa-solid fa-chevron-right" aria-hidden="true"></i>'],
      responsive: {
        0: {
          items: 1
        },
        576: {
          items: 2
        },
        768: {
          items: 3
        }
      }
    });

    UI.owl('.barber-workflow-slides', {
      items: 3,
      loop: true,
      autoplay: true,
      smartSpeed: 800,
      margin: 30,
      center: true,
      dots: true,
      startPosition: 1,
      responsive: {
        0: {
          items: 1
        },
        576: {
          items: 2
        },
        768: {
          items: 3
        }
      }
    });

    UI.owl('.barber-team-slides', {
      items: 3,
      loop: true,
      autoplay: true,
      smartSpeed: 800,
      margin: 50,
      center: true,
      nav: true,
      navText: ['<i class="fa-solid fa-chevron-left" aria-hidden="true"></i>', '<i class="fa-solid fa-chevron-right" aria-hidden="true"></i>'],
      responsive: {
        0: {
          items: 1
        },
        576: {
          items: 2
        },
        768: {
          items: 3
        }
      }
    });

    UI.owl('.testimonials-slides', {
      items: 3,
      loop: true,
      autoplay: true,
      smartSpeed: 1500,
      margin: 0,
      center: true,
      nav: true,
      navText: ['<i class="fa-solid fa-chevron-left" aria-hidden="true"></i>', '<i class="fa-solid fa-chevron-right" aria-hidden="true"></i>'],
      responsive: {
        0: {
          items: 1
        },
        576: {
          items: 2
        },
        768: {
          items: 3
        }
      }
    });

    // Only when some other script has loaded imagesLoaded, as before: this
    // plugin's own copy is not enqueued.
    if (window.imagesLoaded) {
      UI.imagesLoaded('.barber-portfolio', function () {
        // filter items on button click
        UI.toElements('.portfolio-menu').forEach(function (menu) {
          menu.addEventListener('click', function (e) {
            var item = e.target.closest && e.target.closest('p');
            if (!item || !menu.contains(item)) return;
            UI.isotope('.barber-portfolio', { filter: item.getAttribute('data-filter') });
          });
        });
        // init Isotope
        UI.isotope('.barber-portfolio', {
          itemSelector: '.single_gallery_item',
          percentPosition: true,
          masonry: {
            columnWidth: '.single_gallery_item'
          }
        });
      });
    }

    UI.toElements('.portfolio-menu button.btn').forEach(function (button) {
      button.addEventListener('click', function () {
        UI.toElements('.portfolio-menu button.btn').forEach(function (other) {
          other.classList.remove('active');
        });
        button.classList.add('active');
      });
    });

    UI.scrollUp({
      scrollSpeed: 1500,
      scrollText: '<i class="fa-solid fa-angle-up"></i>'
    });

    UI.counter('.counter', { time: 2000 });

    // MC Scripts
    if (document.querySelector('.barber-subscribe-newsletter-area')) {
      window.fnames = ['EMAIL', 'FNAME', 'LNAME', 'ADDRESS', 'PHONE', 'BIRTHDAY'];
      window.ftypes = ['email', 'text', 'text', 'address', 'phone', 'birthday'];
    }

    // The old script also called Barfiller on .bar and the YouTube background
    // plugin on [data-videoid], but this plugin never enqueued either library:
    // the bars were left alone, and a [data-videoid] element made it throw.
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', run);
  } else {
    run();
  }
}());
