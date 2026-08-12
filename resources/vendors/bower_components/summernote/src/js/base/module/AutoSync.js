<<<<<<< HEAD
define([
  'summernote/base/core/dom'
], function (dom) {
  /**
   * textarea auto sync.
   */
  var AutoSync = function (context) {
    var $note = context.layoutInfo.note;

    this.events = {
      'summernote.change': function () {
        $note.val(context.invoke('code'));
      }
    };

    this.shouldInitialize = function () {
      return dom.isTextarea($note[0]);
    };
  };

  return AutoSync;
});
=======
define([
  'summernote/base/core/dom'
], function (dom) {
  /**
   * textarea auto sync.
   */
  var AutoSync = function (context) {
    var $note = context.layoutInfo.note;

    this.events = {
      'summernote.change': function () {
        $note.val(context.invoke('code'));
      }
    };

    this.shouldInitialize = function () {
      return dom.isTextarea($note[0]);
    };
  };

  return AutoSync;
});
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
