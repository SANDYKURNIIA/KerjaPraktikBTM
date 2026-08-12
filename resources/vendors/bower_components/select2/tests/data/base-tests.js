<<<<<<< HEAD
module('Data adapters - Base');

var BaseData = require('select2/data/base');
var $ = require('jquery');
var Options = require('select2/options');

var options = new Options({});

test('current is required', function (assert) {
  var data = new BaseData($('#qunit-fixture select'), options);

  assert.throws(
    function () {
      data.current(function () {});
    },
    'current has no default implementation'
  );
});

test('query is required', function (assert) {
  var data = new BaseData($('#qunit-fixture select'), options);

  assert.throws(
    function () {
      data.query({}, function () {});
    },
    'query has no default implementation'
  );
});
=======
module('Data adapters - Base');

var BaseData = require('select2/data/base');
var $ = require('jquery');
var Options = require('select2/options');

var options = new Options({});

test('current is required', function (assert) {
  var data = new BaseData($('#qunit-fixture select'), options);

  assert.throws(
    function () {
      data.current(function () {});
    },
    'current has no default implementation'
  );
});

test('query is required', function (assert) {
  var data = new BaseData($('#qunit-fixture select'), options);

  assert.throws(
    function () {
      data.query({}, function () {});
    },
    'query has no default implementation'
  );
});
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
