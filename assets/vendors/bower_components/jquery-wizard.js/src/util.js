<<<<<<< HEAD
function emulateTransitionEnd($el, duration) {
    var called = false;

    $el.one(Support.transition.end, function () {
        called = true;
    });
    var callback = function () {
        if (!called) {
            $el.trigger( Support.transition.end );
        }
    }
    setTimeout(callback, duration);
=======
function emulateTransitionEnd($el, duration) {
    var called = false;

    $el.one(Support.transition.end, function () {
        called = true;
    });
    var callback = function () {
        if (!called) {
            $el.trigger( Support.transition.end );
        }
    }
    setTimeout(callback, duration);
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
}