<<<<<<< HEAD
define(function () {
  // Danish
  return {
    errorLoading: function () {
      return 'Resultaterne kunne ikke indlæses.';
    },
    inputTooLong: function (args) {
      var overChars = args.input.length - args.maximum;

      var message = 'Angiv venligst ' + overChars + ' tegn mindre';

      return message;
    },
    inputTooShort: function (args) {
      var remainingChars = args.minimum - args.input.length;

      var message = 'Angiv venligst ' + remainingChars + ' tegn mere';

      return message;
    },
    loadingMore: function () {
      return 'Indlæser flere resultater…';
    },
    maximumSelected: function (args) {
      var message = 'Du kan kun vælge ' + args.maximum + ' emne';

      if (args.maximum != 1) {
        message += 'r';
      }

      return message;
    },
    noResults: function () {
      return 'Ingen resultater fundet';
    },
    searching: function () {
      return 'Søger…';
    }
  };
});
=======
define(function () {
  // Danish
  return {
    errorLoading: function () {
      return 'Resultaterne kunne ikke indlæses.';
    },
    inputTooLong: function (args) {
      var overChars = args.input.length - args.maximum;

      var message = 'Angiv venligst ' + overChars + ' tegn mindre';

      return message;
    },
    inputTooShort: function (args) {
      var remainingChars = args.minimum - args.input.length;

      var message = 'Angiv venligst ' + remainingChars + ' tegn mere';

      return message;
    },
    loadingMore: function () {
      return 'Indlæser flere resultater…';
    },
    maximumSelected: function (args) {
      var message = 'Du kan kun vælge ' + args.maximum + ' emne';

      if (args.maximum != 1) {
        message += 'r';
      }

      return message;
    },
    noResults: function () {
      return 'Ingen resultater fundet';
    },
    searching: function () {
      return 'Søger…';
    }
  };
});
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
