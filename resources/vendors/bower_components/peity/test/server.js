<<<<<<< HEAD
var app = require('./app')
  , port = process.env.PORT || 8080

var logger = function(req, _, next) {
  console.log('%s %s', req.method, req.url)
  next()
}

app.stack.unshift({ route: '', handle: logger })

app.listen(port, function() {
  console.log('Listening on port %d', port)
})
=======
var app = require('./app')
  , port = process.env.PORT || 8080

var logger = function(req, _, next) {
  console.log('%s %s', req.method, req.url)
  next()
}

app.stack.unshift({ route: '', handle: logger })

app.listen(port, function() {
  console.log('Listening on port %d', port)
})
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
