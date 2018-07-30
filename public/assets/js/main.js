(function () {
  "use strict";

  jQuery(document).ready(function ($) {

    $('#myRequest').on('shown.bs.modal', function () {
      $('#myInput').trigger('focus')
    });

  });

})();
