<<<<<<< HEAD
'use strict';

Tinytest.add('Switchery integration', function (test) {

    var checkbox = document.createElement('input');
    checkbox.className = 'js-switch';
    var switchy = new Switchery(checkbox);

    test.instanceOf(switchy, Switchery, 'instantiation OK');
=======
'use strict';

Tinytest.add('Switchery integration', function (test) {

    var checkbox = document.createElement('input');
    checkbox.className = 'js-switch';
    var switchy = new Switchery(checkbox);

    test.instanceOf(switchy, Switchery, 'instantiation OK');
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
});