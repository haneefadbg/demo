var connect = require('connect'), serveStatic = require('serve-static');
var app = connect();
app.use(serveStatic("../Angular"));
app.listen(5000);