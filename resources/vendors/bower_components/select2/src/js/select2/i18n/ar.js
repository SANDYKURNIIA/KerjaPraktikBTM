<<<<<<< HEAD
define(function () {
  // Arabic
  return {
    errorLoading: function () {
      return 'لا يمكن تحميل النتائج';
    },
    inputTooLong: function (args) {
      var overChars = args.input.length - args.maximum;

      var message = 'الرجاء حذف ' + overChars + ' عناصر';

      return message;
    },
    inputTooShort: function (args) {
      var remainingChars = args.minimum - args.input.length;

      var message = 'الرجاء إضافة ' + remainingChars + ' عناصر';

      return message;
    },
    loadingMore: function () {
      return 'جاري تحميل نتائج إضافية...';
    },
    maximumSelected: function (args) {
      var message = 'تستطيع إختيار ' + args.maximum + ' بنود فقط';

      return message;
    },
    noResults: function () {
      return 'لم يتم العثور على أي نتائج';
    },
    searching: function () {
      return 'جاري البحث…';
    }
  };
=======
define(function () {
  // Arabic
  return {
    errorLoading: function () {
      return 'لا يمكن تحميل النتائج';
    },
    inputTooLong: function (args) {
      var overChars = args.input.length - args.maximum;

      var message = 'الرجاء حذف ' + overChars + ' عناصر';

      return message;
    },
    inputTooShort: function (args) {
      var remainingChars = args.minimum - args.input.length;

      var message = 'الرجاء إضافة ' + remainingChars + ' عناصر';

      return message;
    },
    loadingMore: function () {
      return 'جاري تحميل نتائج إضافية...';
    },
    maximumSelected: function (args) {
      var message = 'تستطيع إختيار ' + args.maximum + ' بنود فقط';

      return message;
    },
    noResults: function () {
      return 'لم يتم العثور على أي نتائج';
    },
    searching: function () {
      return 'جاري البحث…';
    }
  };
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
});