<<<<<<< HEAD
;(function(window, document, undefined) {
  "use strict";
  
  <%= contents %>
  
  /*
   * Use SweetAlert with RequireJS
   */
  
  if (typeof define === 'function' && define.amd) {
    define(function () {
      return sweetAlert;
    });
  } else if (typeof module !== 'undefined' && module.exports) {
    module.exports = sweetAlert;
  }

=======
;(function(window, document, undefined) {
  "use strict";
  
  <%= contents %>
  
  /*
   * Use SweetAlert with RequireJS
   */
  
  if (typeof define === 'function' && define.amd) {
    define(function () {
      return sweetAlert;
    });
  } else if (typeof module !== 'undefined' && module.exports) {
    module.exports = sweetAlert;
  }

>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
})(window, document);