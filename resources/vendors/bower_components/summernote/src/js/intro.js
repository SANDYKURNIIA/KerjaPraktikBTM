<<<<<<< HEAD
/**
 * Super simple wysiwyg editor v@VERSION
 * http://summernote.org/
 *
 * summernote.js
 * Copyright 2013-2016 Alan Hong. and other contributors
 * summernote may be freely distributed under the MIT license./
 *
 * Date: @DATE
 */
(function (factory) {
  /* global define */
  if (typeof define === 'function' && define.amd) {
    // AMD. Register as an anonymous module.
    define(['jquery'], factory);
  } else if (typeof module === 'object' && module.exports) {
    // Node/CommonJS
    module.exports = factory(require('jquery'));
  } else {
    // Browser globals
    factory(window.jQuery);
  }
}(function ($) {
  'use strict';
=======
/**
 * Super simple wysiwyg editor v@VERSION
 * http://summernote.org/
 *
 * summernote.js
 * Copyright 2013-2016 Alan Hong. and other contributors
 * summernote may be freely distributed under the MIT license./
 *
 * Date: @DATE
 */
(function (factory) {
  /* global define */
  if (typeof define === 'function' && define.amd) {
    // AMD. Register as an anonymous module.
    define(['jquery'], factory);
  } else if (typeof module === 'object' && module.exports) {
    // Node/CommonJS
    module.exports = factory(require('jquery'));
  } else {
    // Browser globals
    factory(window.jQuery);
  }
}(function ($) {
  'use strict';
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
