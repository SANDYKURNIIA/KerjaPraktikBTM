<<<<<<< HEAD
var beautify = require('js-beautify').html;

var entityMap = {
  "&": "&amp;",
  "<": "&lt;",
  ">": "&gt;",
  '"': '&quot;',
  "'": '&#39;',
  "/": '&#x2F;'
};
module.exports.register = function (Handlebars, options) {
  Handlebars.registerHelper('code', function (hboptions) {
    var codeStr = beautify(String(hboptions.fn(this)).trim(), {
      "wrap_line_length": 80,
      "wrap_attributes": "auto",
      "indent_scripts": "normal"
    }).replace(/[&<>"'\/]/g, function (s) {
      return entityMap[s];
    });

    return '<div class="example-code">' + codeStr + '</div>';
  });
};
=======
var beautify = require('js-beautify').html;

var entityMap = {
  "&": "&amp;",
  "<": "&lt;",
  ">": "&gt;",
  '"': '&quot;',
  "'": '&#39;',
  "/": '&#x2F;'
};
module.exports.register = function (Handlebars, options) {
  Handlebars.registerHelper('code', function (hboptions) {
    var codeStr = beautify(String(hboptions.fn(this)).trim(), {
      "wrap_line_length": 80,
      "wrap_attributes": "auto",
      "indent_scripts": "normal"
    }).replace(/[&<>"'\/]/g, function (s) {
      return entityMap[s];
    });

    return '<div class="example-code">' + codeStr + '</div>';
  });
};
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
