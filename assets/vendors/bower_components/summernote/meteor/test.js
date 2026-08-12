<<<<<<< HEAD
'use strict';

Tinytest.add('Instantiation', function (test) {
  var editor = document.createElement('div');
  document.body.appendChild(editor);
  $(editor).summernote();

  test.equal(typeof $(editor).code(), 'string', 'Instantiation');
});
=======
'use strict';

Tinytest.add('Instantiation', function (test) {
  var editor = document.createElement('div');
  document.body.appendChild(editor);
  $(editor).summernote();

  test.equal(typeof $(editor).code(), 'string', 'Instantiation');
});
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
