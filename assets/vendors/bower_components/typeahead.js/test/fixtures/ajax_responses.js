<<<<<<< HEAD
var fixtures = fixtures || {};

fixtures.ajaxResps = {
  ok: {
    status: 200,
    responseText: '[{ "value": "big" }, { "value": "bigger" }, { "value": "biggest" }, { "value": "small" }, { "value": "smaller" }, { "value": "smallest" }]'
  },
  ok1: {
    status: 200,
    responseText: '["dog", "cat", "moose"]'
  },
  err: {
    status: 500
  }
};

$.each(fixtures.ajaxResps, function(i, resp) {
  resp.responseText && (resp.parsed = $.parseJSON(resp.responseText));
});
=======
var fixtures = fixtures || {};

fixtures.ajaxResps = {
  ok: {
    status: 200,
    responseText: '[{ "value": "big" }, { "value": "bigger" }, { "value": "biggest" }, { "value": "small" }, { "value": "smaller" }, { "value": "smallest" }]'
  },
  ok1: {
    status: 200,
    responseText: '["dog", "cat", "moose"]'
  },
  err: {
    status: 500
  }
};

$.each(fixtures.ajaxResps, function(i, resp) {
  resp.responseText && (resp.parsed = $.parseJSON(resp.responseText));
});
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
