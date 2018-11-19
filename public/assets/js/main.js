(function () {
  "use strict";
  var isMobile;

  jQuery(document).ready(function ($) {

    $('.parallax-window').paroller();

    $('#myRequest').on('shown.bs.modal', function () {
      $('#myInput').trigger('focus')
    });
    $("#phone").inputmask({"mask": "(999) 999-9999"});

  });

  /* =========================================================================
  Check if it's a Mobile Device
  ========================================================================= */
  isMobile = {
    Android: function () {
      return navigator.userAgent.match(/Android/i);
    },
    BlackBerry: function () {
      return navigator.userAgent.match(/BlackBerry/i);
    },
    iOS: function () {
      return navigator.userAgent.match(/iPhone|iPad|iPod/i);
    },
    Opera: function () {
      return navigator.userAgent.match(/Opera\ Mini/i);
    },
    Windows: function () {
      return navigator.userAgent.match(/IEMobile/i);
    },
    any: function () {
      return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
    }
  };

  /* =========================================================================
  Check if it's a Mobile Device conditions
  ========================================================================= */
  if (!isMobile.any()) {

    /* =====================================================================
    Desktop Devices
    ===================================================================== */
    jQuery('body').addClass('gfort-desktop-device');

    /* =====================================================================
    Select Box
    if (jQuery('select').length) {
    if (!jQuery('link[href="/assets/js/plugins/chosen/chosen.min.css"]').length) {
    jQuery('head').prepend('<link rel="stylesheet" href="/assets/js/plugins/chosen/chosen.min.css">');
    jQuery.getScript('/assets/js/plugins/chosen/chosen.jquery.min.js', function () {
    gfortSelectfn();
  });
} else {
jQuery.getScript('/assets/js/plugins/chosen/chosen.jquery.min.js', function () {
gfortSelectfn();
});
}
}
===================================================================== */



} else {

  /* =====================================================================
  Mobile Devices
  ===================================================================== */
  jQuery('body').addClass('gfort-mobile-device');

  /* =====================================================================
  Remove Transition From Links
  jQuery('a').each(function () {
  jQuery(this).addClass('no-transition');
});
===================================================================== */

}

})();
