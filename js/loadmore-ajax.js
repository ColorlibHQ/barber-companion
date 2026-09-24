/**
 * Portfolio "load more" (.loadAjax): fetches the next items over admin-ajax,
 * puts them in .barber-portfolio-load and lays the Isotope grid out again.
 * No jQuery.
 */
(function () {
  'use strict';

  /**
   * The request body as jQuery built it ($.param): nested arrays and objects
   * become key[0][name]=value pairs, which PHP reads back as arrays.
   */
  function flatten(prefix, value, out) {
    if (value !== null && typeof value === 'object') {
      Object.keys(value).forEach(function (key) {
        flatten(prefix + '[' + key + ']', value[key], out);
      });
    } else {
      out[prefix] = value === null || value === undefined ? '' : value;
    }
    return out;
  }

  function run() {
    var UI = window.ColorlibUI;
    var settings = window.portfolioloadajax;
    if (!UI) return;

    //  Portfolio load more button Ajax
    var buttons = UI.toElements('.loadAjax');
    if (!buttons.length || !settings) return;

    var postNumber = settings.postNumber,
      Incr = 0;

    buttons.forEach(function (button) {
      button.addEventListener('click', function (e) {
        e.preventDefault();
        e.stopPropagation();

        Incr = Incr + parseInt(postNumber, 10);

        var data = {
          'action': 'barber_portfolio_ajax',
          'postNumber': postNumber,
          'postIncrNumber': Incr
        };
        flatten('elsettings', settings.elsettings, data);

        UI.request(settings.action_url, { method: 'POST', data: data }).then(function (html) {
          UI.toElements('.barber-portfolio-load').forEach(function (el) {
            el.innerHTML = html;
          });

          UI.isotope('.barber-portfolio', 'reloadItems');
          UI.isotope('.barber-portfolio', {
            itemSelector: '.single_gallery_item',
            percentPosition: true,
            masonry: {
              columnWidth: '.single_gallery_item'
            }
          });

          var loaditems = parseInt(Incr, 10) + parseInt(postNumber, 10);

          if (settings.totalitems == loaditems) {
            button.style.display = 'none';
          }
        });
      });
    });
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', run);
  } else {
    run();
  }
}());
